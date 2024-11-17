import { Component, OnInit } from '@angular/core';
import { NavbarComponent } from "../componentes/navbar/navbar.component";
import { Receita } from '../model/receita';
import { HttpClient } from '@angular/common/http';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-receita',
  standalone: true,
  imports: [NavbarComponent],
  templateUrl: './receita.component.html',
  styleUrl: './receita.component.scss'
})
export class ReceitaComponent implements OnInit {
  receita = {} as Receita

  constructor(private http: HttpClient, private route: ActivatedRoute) {
  }

  ngOnInit(): void {
    this.route.queryParams
      .subscribe(params => this.http.get<Receita>("http://localhost:8000/php-servidor/receita.php", { params })
        .subscribe(result => this.receita = result)
      )
  }


}
