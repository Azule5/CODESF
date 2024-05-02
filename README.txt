# Manual de Configuração do Ambiente Local para Rodar o site CODESF

Este manual foi criado para orientar você na configuração do ambiente local necessário para executar o site CODESF em seu próprio computador. Se você recebeu os arquivos zipados do site e o arquivo SQL do banco de dados correspondente, este guia ajudará você a configurar tudo para que o site funcione perfeitamente em seu ambiente de desenvolvimento local. Siga as instruções abaixo com atenção para garantir uma configuração correta e sem problemas.

## Preparação

1. Baixe e instale um ambiente de desenvolvimento local compatível com os requisitos do Joomla (como XAMPP, WampServer, ou similar).
2. Certifique-se de que o PHP na versão 8.1.10 esteja configurado no seu ambiente local.

## Descompactando os Arquivos

1. Baixe os arquivos zipados do site e o arquivo SQL do banco de dados.
2. Descompacte os arquivos do site na pasta do servidor web local (por exemplo, htdocs no XAMPP).

## Importando o Banco de Dados

1. Abra o phpMyAdmin e crie um novo banco de dados com um nome “codesf” (em minúsculo).
2. Importe o arquivo SQL do banco de dados fornecido para o novo banco de dados criado.

## Configurando o configuration.php

1. Acesse a pasta onde você descompactou os arquivos.
2. Localize o arquivo configuration.php na pasta raiz do diretório.
3. Abra o arquivo configuration.php em um editor de texto.
4. Edite as informações do banco de dados no arquivo configuration.php para corresponder às configurações do banco de dados local:
   - `public $host = 'localhost';`: Mantenha como 'localhost' se estiver usando um ambiente local padrão.
   - `public $user = 'seu_usuario';`: Insira o nome de usuário do banco de dados.
   - `public $password = 'sua_senha';`: Insira a senha do banco de dados.
   - `public $db = 'codesf';`: Insira o nome do banco de dados que você criou.
5. Salve as alterações no arquivo configuration.php.

## Acessando o Site

1. Abra um navegador da web e digite o endereço local do site (por exemplo, http://localhost/nome-da-pasta).
2. O site deverá ser carregado corretamente.

## Conclusão

Parabéns! Você configurou com sucesso o ambiente local para rodar o site. Agora você pode acessar e explorar o site localmente em seu ambiente.

Projeto no GitHub: [CODESF](https://github.com/Azule5/CODESF)

Sinta-se à vontade para fazer o download dos arquivos, contribuir com melhorias, ou acompanhar o desenvolvimento do projeto. Qualquer dúvida ou sugestão, não hesite em entrar em contato.

Agradecimentos:

Este projeto foi desenvolvido como parte de um esforço colaborativo para criar uma experiência eficiente, funcional, atrativa e segura para todos os envolvidos. Abaixo estão os nomes e e-mails dos colaboradores envolvidos:

- Eleésio Zacarias de Souza Filho
  E-mail: eleesio.1094410@discente.uemg.br

- João Pedro Garcia do Carmo
  E-mail: joao.1098476@discente.uemg.br

- Katarine Rodrigues Almeida
  E-mail: katarine.1098519@discente.uemg.br

- Natallia Soares dos Santos
  E-mail: natallia.1098585@discente.uemg.br

Cada um desses colaboradores contribuiu com seu conhecimento e habilidades para tornar o site e este manual possível e auxiliar na configuração bem-sucedida do seu ambiente local para rodar o site.
