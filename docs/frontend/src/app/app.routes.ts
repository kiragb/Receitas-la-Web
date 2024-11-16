import { Routes } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { ReceitaComponent } from './receita/receita.component';
import { CadastroComponent } from './cadastro/cadastro.component';

export const routes: Routes = [
    { path: '', component: HomeComponent },
    { path: 'receita', component: ReceitaComponent },
    { path: 'cadastro', component: CadastroComponent },
];
