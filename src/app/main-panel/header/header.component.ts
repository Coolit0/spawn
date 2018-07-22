import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {
  @Input() parent;

  showNav = false;

  constructor() { }

  ngOnInit() {
    this.showNav = this.parent.showNav;
  }

  toggleNav() {
    this.parent.showNav = !this.parent.showNav;
  }
}