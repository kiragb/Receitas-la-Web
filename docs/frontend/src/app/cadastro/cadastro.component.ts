import { Component } from '@angular/core';

@Component({
  selector: 'app-cadastro',
  standalone: true,
  imports: [],
  templateUrl: './cadastro.component.html',
  styleUrl: './cadastro.component.scss'
})
export class CadastroComponent {
  previewImagem(event: any) {
    var reader = new FileReader();
    reader.onload = function () {
      var preview = document.getElementById('preview') as HTMLImageElement;
      if (preview === null) {
        return;
      }
      preview.src = reader.result as string;
      preview.style.display = 'block'; // Exibe a imagem
    };
    reader.readAsDataURL(event.target.files[0]); // Lê o arquivo selecionado
  }
}
