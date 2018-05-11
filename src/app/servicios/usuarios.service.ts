import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders, HttpParams} from '@angular/common/http';
import { Observable } from 'rxjs/Observable';
import { stringify } from 'querystring';



@Injectable()
export class UsuariosService {

  urlApi:string = "http://localhost:8000/api/usuarios";
  constructor( private httpClient:HttpClient) {


   }

   postUsuario(usuario): Observable<any>{
    return this.httpClient.post(this.urlApi, usuario, {responseType:'text'} );
}

getUsuario(parametros) :Observable<any>{
  let misheaders = new HttpHeaders();
  misheaders.append('Content-Type', 'application/json');
    return this.httpClient.get(this.urlApi,{headers: misheaders,  params: parametros});
 }

}
