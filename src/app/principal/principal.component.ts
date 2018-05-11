import { Component, OnInit, ViewChild } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import {FormsModule} from '@angular/forms';
import {NgForm} from '@angular/forms';
import {ArchivosService} from '../servicios/archivos.service';
import {Router} from '@angular/router';
import 'rxjs/Rx' ;

@Component({
  selector: 'app-principal',
  templateUrl: './principal.component.html',
  styleUrls: ['./principal.component.css']
})
export class PrincipalComponent implements OnInit {

    categoriaSeleccionada :string = 'archivos'; 
    archivoSeleccionado :File = null;
    listaDeArchivos : any[];
    archivoOpcSeleccionado ="";
    usuario : any;
    idDetallesArchivo:any ="";
  constructor( private archivosService : ArchivosService,
               private httpClient: HttpClient , 
               private router:Router   
      ) { 

  }

  ngOnInit() {
  this.usuario = JSON.parse( localStorage.getItem('sesionUsuario'));
   
  if(localStorage.getItem('sesionUsuario') != null){
    
      
      this.getArchivosUsuario(this.usuario.id);
    }else{
      this.router.navigate(['/login']);
    }

  
  }

  guardarArchivo(){
    
  }

  getArchivosUsuario(idUsuario){


    this.archivosService.getArchivos(idUsuario).subscribe(
      result =>{

        this.listaDeArchivos = result;
          console.log(result);
      },

      error =>{
          console.log(error);
      }
    );
  }

  seleccionarCategoria(categoria :any){
    
      this.archivoOpcSeleccionado="";
    if(categoria=="archivos"){
        this.getArchivosUsuario(this.usuario.id);
    }
    this.categoriaSeleccionada = categoria;
  }

  onArchivoSeleccionado(event){
    this.archivoSeleccionado = <File> event.target.files[0];
    console.log(this.archivoSeleccionado);
    console.log(event);
  }

  onArchivoOpcSeleccionar(idArchivo){

    if(idArchivo==this.archivoOpcSeleccionado){
      this.archivoOpcSeleccionado=""
    }else{
      this.archivoOpcSeleccionado = idArchivo;
    }
      
  }

  onDescargarArchivo(idArchivo){
    this.archivoOpcSeleccionado="";
    var newWindow = window.open('http://192.168.1.16:8000/api/archivos/'+idArchivo);
   /*
    this.archivosService.descargarArchivo(idArchivo).subscribe(
      result=>{
          console.log(result);
          var newWindow = window.open('');
                },
      error=>{
          console.log(error);
      }
    );
    */
  }


  onSubirArchivo(){

  
    const fd = new FormData();
    fd.append('file',this.archivoSeleccionado);
    fd.append('idUsuario',this.usuario.id);

    console.log(this.usuario.id);

    this.archivosService.postArchivo(fd).subscribe(
        resultado =>{
          console.log(resultado);
          this.categoriaSeleccionada="archivos";
          this.categoriaSeleccionada="archivos";
          this.getArchivosUsuario(this.usuario.id);
        },  
        error=> {
          console.log(error);
        }

    );


  }

  onEliminarArchivo(idArchivo){

    this.archivosService.eliminarArchivo(idArchivo).subscribe(
      result=>{
          this.getArchivosUsuario(this.usuario.id);
      },
      error=>{
          console.log(error);
      }
    );
  }

}
