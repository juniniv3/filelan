
import { Component, OnInit, ViewChild } from '@angular/core';
import {FormsModule} from '@angular/forms';
import {NgForm} from '@angular/forms';
import { UsuariosService}  from '../servicios/usuarios.service';
import {Router} from "@angular/router";

@Component({
  selector: 'app-registro',
  templateUrl: './registro.component.html',
  styleUrls: ['./registro.component.css']
})
export class RegistroComponent implements OnInit {
  
  @ViewChild('formRegistro') formRegistro:NgForm;
  datosRegistro:any;

  constructor(private usuariosService: UsuariosService, 
    private router: Router) { 

      this.datosRegistro ={
        nombre:'',
        correo:'',
        cuenta:'',
        contrasena:'',
        fechaRegistro:'',

      }
  

    }

  ngOnInit() {
  }


  registroUsuario(){
    
    this.datosRegistro.nombre = this.formRegistro.value.nombreUsuario;
    this.datosRegistro.correo = this.formRegistro.value.conrreoUsuario;
    this.datosRegistro.cuenta = this.formRegistro.value.cuentaUsuario;
    this.datosRegistro.contrasena = this.formRegistro.value.contrasenaUsuario;
   

    this.formRegistro.reset();
    console.log(this.formRegistro);
   
    this.usuariosService.postUsuario(this.datosRegistro).subscribe(
      resultado =>{
       
        this.router.navigate(['/login']);
      },
      error=>{
          console.log(error);
      }
    );

  }



}
