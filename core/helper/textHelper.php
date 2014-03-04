<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of uploadHelper
 *
 * @author alvaro
 */
class textHelper {

    public function abbreviateString($texto, $limite, $tres_p = '...') {
        $totalCaracteres = 0;
        //Retorna o texto em plain/text
        $texto = $this->someText($texto);
        //Cria um array com todas as palavras do texto
        $vetorPalavras = explode(" ", $texto);
        if (strlen($texto) <= $limite):
            $tres_p = "";
            $novoTexto = $texto;
        else:
            //Começa a criar o novo texto resumido.
            $novoTexto = "";
            //Acrescenta palavra por palavra na string enquanto ela
            //não exceder o tamanho máximo do resumo
            for ($i = 0; $i < count($vetorPalavras); $i++):
                $totalCaracteres += strlen(" " . $vetorPalavras[$i]);
                if ($totalCaracteres <= $limite)
                    $novoTexto .= ' ' . $vetorPalavras[$i];
                else
                    break;
            endfor;
        endif;
        return $novoTexto . $tres_p;
    }

    public function someText($string) {
        $trans_tbl = get_html_translation_table(HTML_ENTITIES);
        $trans_tbl = array_flip($trans_tbl);
        return trim(strip_tags(strtr($string, $trans_tbl)));
    }
}

?>
