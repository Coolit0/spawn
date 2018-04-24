<?php
# $Id$

$navClass = '';
if ((isset($_SESSION['showLeftNav'])) && ($_SESSION['showLeftNav'] != 'hidden')) {
	$navClass = ' showLeftNav';
}
$headerIncludes = '';
if(isset($header['includes'])){
    $headerIncludes = '/'.base64_encode(json_encode($header['includes']));
}

$htmlClass = '';
if ($_SESSION['maintenance']['isActive'] || $_SESSION['maintenance']['showWarning']) {
    $htmlClass = ' class="showHeaderMessage"';
}

?>
<!DOCTYPE html>
<!--[if lt IE 7]>	  <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>		 <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>		 <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $header['pageTitle']; ?></title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width" />
        <link rel="icon" type="image/x-icon" href="<?php echo base_url('favicon.ico'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('home/loadSiteCSS/'.base64_encode($view).'/'.date('YmdHis').$headerIncludes); ?>" />
        <script><?php echo file_get_contents('js/vendor/modernizr-2.6.2.min.js'); ?></script>
        <script>var HRHub = {}; HRHub.session = {};</script>
    </head>
    <body<?php echo $htmlClass; ?>>
        <!--[if lte IE 9]>
        <div id="headerMessage">
                <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
        </div>
        <![endif]-->                                
        <?php if ($_SESSION['maintenance']['isActive'] || $_SESSION['maintenance']['showWarning']) { ?>
            <div id="headerMessage">
                <p>
                    <?php
                    if ($_SESSION['maintenance']['isActive']) {
                        echo $_SESSION['maintenance']['currentDetails']['message'];
                    } else {
                        echo $_SESSION['maintenance']['currentDetails']['warning'];
                    }
                    ?>
                </p>
            </div>
        <?php } ?>
        <header <?php if (!$_SESSION['loggedIn']) { echo ' class="hideHeader"'; }?>>
            <nav class="left">
            </nav>
            <nav class="right">
            </nav>

        <?php
        if (isset($_SESSION['assignedAccounts']) && count($_SESSION['assignedAccounts']) > 1) {
        ?>
            <!-- Select Database Modal -->
            <div id="accountSelectModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="closeModalBackground">
                        <span id="accountSelectCloseButton" class="closeAccountModal">&times;</span>
                    </span>
                    <h3>Current Account</h3>
                </div>
                <div class="modal-body">
                    <div id="accountSelect">
                        <div id="modalSearchBar">
                            <input type="text" id="accountSelectSearch" placeholder="Search Accounts..." title="Type in an account name..." />
                        </div>
                        <div id="accountSelectTableContainer">
                            <form id="accountSelectForm">
                                <fieldset>
                                    <div>
                                        <ul class="accountSelectSearchUL" id="accountSelectSelectUL" name="accountSelectSelectUL"><?php foreach ($_SESSION['assignedAccounts'] as $accID => $accDetails) { ?><li title="<?php echo strtoupper($accID) . ' &ndash; ' . strtoupper($accDetails["name"]); ?>" data-accountID="<?php echo $accID; ?>" <?php if ($_SESSION['selectedAccount'] == $accID) { ?> class="selected" <?php } else { ?> class = "notselected" <?php } ?>><?php echo strtoupper($accID) . ' &ndash; ' . strtoupper($accDetails["name"]); ?></li><?php } ?></ul>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div id="modalButtonContainer">
                        <span>
                            <button id="accountSelectAccountButton" type="button" class="modalButton">OK</button>
                        </span>
                        <span>
                            <button id="accountSelectCancelButton" type="button" class="modalButton">Cancel</button>
                        </span>
                    </div>
                </div>
            </div>
            </div>
        <?php
            echo '<script>HRHub.session.showSelectDb = true;</script>';
        }
        ?>
    <!-- About Modal -->
    <div id="accountSelectModalAboutUs" class="modal">
        <!-- Modal content -->
        <div class="modal-contentAboutUs">
            <div class="modal-header">
                <span class="closeModalBackground">
                    <span class="closeAccountModal" onclick="hideModal('aboutUs')">&times;</span>
                </span>
                <h3>About Us</h3>
            </div>
            <div class="modal-body">
                <p><img src="<?php echo base_url('css/'.$_SESSION['siteConfig']['siteSkin'].'/images/logos/mpblue.png'); ?>" alt=""/></p>
                <p id="copyright">&copy; 2013<?php if (date("Y") > '2013') { echo ' &ndash; '.date("Y"); } ?> Moorepay Ltd</p>
                <p>Moorepay Ltd, Warwick House, Hollins Brook Way, Pilsworth, Bury, BL9 8RR</p>
            </div>
            <div class="modal-footer">
                <div id="modalButtonContainer">
                    <span>
                        <button type="button" class="modalButton" onclick="hideModal('aboutUs')">OK</button>
                    </span>
                </div>
            </div>
        </div>
    </div>    
</header>
<div id="modalAjaxLoader" class="ajaxLoaderWrap">
    <p>Please wait while we process your request. This could take a few minutes to complete and this window will close when it has completed.</p>
    <div class="ajaxLoaderAnimation"></div>
</div> 
<div id="bodyWrapper" class="<?php echo $header['bodyClass'].$navClass; ?> clearfix">
