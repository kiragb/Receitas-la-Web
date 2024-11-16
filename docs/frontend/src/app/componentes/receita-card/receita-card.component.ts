import { Component, Input } from '@angular/core';
import { Receita } from '../../model/receita';

@Component({
  selector: 'app-receita-card',
  standalone: true,
  imports: [],
  templateUrl: './receita-card.component.html',
  styleUrl: './receita-card.component.scss'
})
export class ReceitaCardComponent {
  @Input() receita: Receita = {} as Receita;

}
