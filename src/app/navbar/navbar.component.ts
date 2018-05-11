import { Component, OnInit } from '@angular/core';
import {Router} from '@angular/router';
@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {

  activarOpciones:boolean= false;
  usuario:any;
  usuarioLogeado:boolean = false;

  constructor(private router:Router   ) { }

  ngOnInit() {

    this.usuario = localStorage.getItem('sesionUsuario');

   
    if(this.usuario!=null){
        this.usuarioLogeado=true;
       
    }else{
      this.usuario="";
      this.usuarioLogeado=false;
    }

  }

  onActivarOpciones(){



    if (this.activarOpciones) {
      this.activarOpciones=false;
    }else{
      this.activarOpciones=true;
    }
      
  }

  deslogear(){
    localStorage.clear();
    this.router.navigate(['/login']);
    this.usuarioLogeado= false;
    this.activarOpciones= false;
  }

}
