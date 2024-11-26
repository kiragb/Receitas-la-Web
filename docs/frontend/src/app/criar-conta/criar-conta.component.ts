import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Router, RouterModule } from '@angular/router';

@Component({
  selector: 'app-criar-conta',
  standalone: true,
  imports: [RouterModule, FormsModule],
  templateUrl: './criar-conta.component.html',
  styleUrls: ['../painel.scss', './criar-conta.component.scss']
})
export class CriarContaComponent {
  constructor(private router: Router) {
  }

  onSubmit() {
    this.router.navigate(['/'])
  }
}
