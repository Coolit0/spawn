import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-main-panel',
  templateUrl: './main-panel.component.html',
  styleUrls: ['./main-panel.component.css']
})
export class MainPanelComponent implements OnInit {
  scope: {};
  showNav = false;

  constructor() { }

  ngOnInit() {
    this.scope = {
      showNav: true
    }
  }

}
