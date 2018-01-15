<?php
// verifica se foi enviado um arquivo 

if (isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0) {
    $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
    $nome = $_FILES['arquivo']['name'];
    // Pega a extensao
    $extensao = strrchr($nome, '.');
    // Converte a extensao para mimusculo
    $extensao = strtolower($extensao);
    // Somente imagens, .jpg;.jpeg;.gif;.png
    // Aqui eu enfilero as extesões permitidas e separo por ';'
    // Isso server apenas para eu poder pesquisar dentro desta String
    if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
        // Cria um nome único para esta imagem
        // Evita que duplique as imagens no servidor.
        $novoNome = md5(microtime()) . $extensao;
        // Concatena a pasta com o nome
        $destino = '../imagens/'. $novoNome;

        @move_uploaded_file($arquivo_tmp, $destino);

    } else
        echo "Você poderá enviar apenas arquivos \"*.jpg;*.jpeg;*.gif;*.png\"<br />";
} else {
    echo "Você não enviou nenhum arquivo!";
}
?>