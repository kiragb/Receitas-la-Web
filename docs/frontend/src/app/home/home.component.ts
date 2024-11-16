import { Component, OnInit } from '@angular/core';
import { NavbarComponent } from "../componentes/navbar/navbar.component";
import { HttpClient } from '@angular/common/http';
import { Receitas } from '../model/receitas';
import { ReceitaCardComponent } from "../componentes/receita-card/receita-card.component";
import { CommonModule, NgForOf } from '@angular/common';

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [NavbarComponent, ReceitaCardComponent, CommonModule],
  templateUrl: './home.component.html',
  styleUrl: './home.component.scss'
})
export class HomeComponent implements OnInit {
  receitas: Receitas = {receitas: [], receitasTematicas: []};
  constructor(private http: HttpClient) {
  }

  ngOnInit(): void {
    this.http.get<Receitas>("http://localhost:8000/php-servidor/receitas.php").subscribe(result => this.receitas = result)
  }
}
