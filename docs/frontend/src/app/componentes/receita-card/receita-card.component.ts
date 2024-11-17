import { Component, Input } from '@angular/core';
import { Receita } from '../../model/receita';
import { Route, Router } from '@angular/router';

@Component({
  selector: 'app-receita-card',
  standalone: true,
  imports: [],
  templateUrl: './receita-card.component.html',
  styleUrl: './receita-card.component.scss'
})
export class ReceitaCardComponent {
  @Input() receita: Receita = {} as Receita;

  constructor(private router: Router) {
  }

  abrir_receita() {
    this.router.navigate(['receita'], { queryParams: {'receita_id': this.receita.id } })
  }
}
