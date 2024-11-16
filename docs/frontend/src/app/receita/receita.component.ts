import { Component } from '@angular/core';
import { NavbarComponent } from "../componentes/navbar/navbar.component";

@Component({
  selector: 'app-receita',
  standalone: true,
  imports: [NavbarComponent],
  templateUrl: './receita.component.html',
  styleUrl: './receita.component.scss'
})
export class ReceitaComponent {

}
