import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Router, RouterModule } from '@angular/router';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [RouterModule, FormsModule],
  templateUrl: './login.component.html',
  styleUrls: ['../painel.scss', './login.component.scss']
})
export class LoginComponent {
  constructor(private router: Router) {
  }

  onSubmit() {
    this.router.navigate(['/'])
  }
}
