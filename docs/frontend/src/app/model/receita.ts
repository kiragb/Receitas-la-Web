export interface Receita {
    id: number;
    titulo_receita: string;
    minutos_para_preparo: number;
    porcoes: number;
    imagem_url: string;
    ingredientes: string[];
    modo_de_preparo: string[];
    tipo: string;
    tematica: boolean;
}
