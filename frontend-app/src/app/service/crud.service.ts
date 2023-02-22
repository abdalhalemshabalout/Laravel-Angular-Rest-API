import { Injectable } from '@angular/core';
import {Book} from './Book';
import { catchError, map } from 'rxjs';
import { Observable, throwError } from 'rxjs';
import { HttpClient, HttpHeaders, HttpErrorResponse } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class CrudService {

  constructor() { }
}
