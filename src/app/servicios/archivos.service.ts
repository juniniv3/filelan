import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders, HttpParams} from '@angular/common/http';
import { Observable } from 'rxjs/Observable';
import { stringify } from 'querystring';



@Injectable()
export class ArchivosService {

  urlApi:string = "http://localhost:8000/api/archivos";
  constructor( private httpClient:HttpClient) {


   }



   postArchivo(archivo): Observable<any>{
        return this.httpClient.post(this.urlApi, archivo, {responseType:'text'} );
   }

   getArchivos(parametros) :Observable<any>{
    let misheaders = new HttpHeaders();
    misheaders.append('Content-Type', 'application/json');

    const misParams = {'idUsuario': parametros}
      return this.httpClient.get(this.urlApi,{headers: misheaders,  params: misParams});
   }

   descargarArchivo(id:any):Observable<any>{
    console.log(id);
    return this.httpClient
    .get(this.urlApi+'/'+id, { observe: 'response', responseType: 'text' });
    
  }

  eliminarArchivo(id:any):Observable<any>{
    return this.httpClient
    .delete(this.urlApi+'/'+id,{ observe: 'response', responseType: 'text' });
  }


}
