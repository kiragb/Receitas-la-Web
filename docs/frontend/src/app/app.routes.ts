import { Routes } from '@angular/router';
import { CadastroComponent } from './cadastro/cadastro.component';
import { CriarContaComponent } from './criar-conta/criar-conta.component';
import { HomeComponent } from './home/home.component';
import { LoginComponent } from './login/login.component';
import { ReceitaComponent } from './receita/receita.component';

export const routes: Routes = [
    { path: '', component: HomeComponent },
    { path: 'receita', component: ReceitaComponent },
    { path: 'cadastro', component: CadastroComponent },
    { path: 'login', component: LoginComponent },
    { path: 'criar-conta', component: CriarContaComponent },
];
