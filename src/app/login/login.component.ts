import { Component, OnInit, ViewChild } from '@angular/core';
import {FormsModule} from '@angular/forms';
import {NgForm} from '@angular/forms';
import { UsuariosService}  from '../servicios/usuarios.service';
import {Router} from "@angular/router";

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  @ViewChild('formIngreso') formIngreso:NgForm;
  formularioIngreso:any;


  constructor( private usuariosService: UsuariosService, 
              private router: Router
            ) { 

    this.formularioIngreso ={
      cuentaUsuario:'',
      contrasenaUsuario:'',
    }

  }

  ngOnInit() {
    if(localStorage.getItem('sesionUsuario')!=null){
      this.router.navigate(['/principal']);

    }
  }

  login(){
    
    this.formularioIngreso.cuentaUsuario = this.formIngreso.value.cuentaUsuario;
    this.formularioIngreso.contrasenaUsuario = this.formIngreso.value.contrasenaUsuario;

    this.formIngreso.reset();
    console.log(this.formularioIngreso);
    this.usuariosService.getUsuario(this.formularioIngreso).subscribe(
      result=>{
            localStorage.setItem('sesionUsuario', JSON.stringify(result));
            this.router.navigate(['/principal']);
      },
      error=>{

      }
    );
      this.formularioIngreso="";

  }
  irRegistro(){
    this.router.navigate(['registro']); 
  }




}
