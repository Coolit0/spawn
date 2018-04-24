			<div id="modal_restartLoginBox" class="modalForm">
				<form class="modalForm">
					<fieldset>
						<div>
							<label for="restartLoginPassword">Please re-enter your password to continue your session:</label>
							<input type="password" id="restartLoginPassword" name="restartLoginPassword" />
						</div>
					</fieldset>
				</form>
			</div>
		</div>
        <script src="<?php echo base_url('home/loadSiteJS1/'.base64_encode($view).'/'.date('YmdHis')); ?>"></script>
        <?php if (!empty($footer['jsVars'])) { 
            echo '<script>';
            foreach ($footer['jsVars'] as $varVar => $varData) { 
                echo 'var '.$varVar.' = '.$varData.';'; 
            }
            echo '</script>';
        } ?>
        <?php if (isset($footer['includes'])) {
        echo '<script>';
            foreach($footer['includes'] as $file ){
                if (file_exists(constant('FCPATH').'js/view_js/' . $file . '.js')) {
                    echo file_get_contents(constant('FCPATH').'js/view_js/' . $file . '.js');
                } else if (file_exists(constant('FCPATH').$file)) {
                    echo file_get_contents(constant('FCPATH').$file);
                } else {
                    echo $file;
                }
            }
        echo '</script>';
        } ?>
        <script src="<?php echo base_url('home/loadSiteJS2/'.base64_encode($view).'/'.date('YmdHis')); ?>"></script>
        
    </body>
</html>
