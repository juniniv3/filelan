import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import {Routes, RouterModule} from '@angular/router';
import { AppComponent } from './app.component';
import { LoginComponent } from './login/login.component';
import { InicioComponent } from './inicio/inicio.component';
import { NavbarComponent } from './navbar/navbar.component';
import { PrincipalComponent } from './principal/principal.component';
import { ArchivosService}  from '../app/servicios/archivos.service';
import { UsuariosService}  from '../app/servicios/usuarios.service';
import {HttpClientModule} from '@angular/common/http';
import {FormsModule} from '@angular/forms';
import { RegistroComponent } from './registro/registro.component';



const routes: Routes =[
  {path: '', component:InicioComponent},
  {path: 'inicio', component:InicioComponent},
  {path:'login', component:LoginComponent},
  {path:'principal',component:PrincipalComponent},
  {path:'registro',component:RegistroComponent}

];

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    InicioComponent,
    NavbarComponent,
    PrincipalComponent,
    RegistroComponent
  ],
  imports: [
    BrowserModule,
    RouterModule.forRoot(routes),
    HttpClientModule,
    FormsModule,

  ],
  providers: [
    ArchivosService,
    UsuariosService,
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
