# 📚 Bookwise - Sua Plataforma de Leitura e Avaliação de Livros 🚀

## 🌟 Introdução

Bem-vindo ao **Bookwise**! Este projeto é uma plataforma web desenvolvida como parte de um estudo aprofundado da linguagem PHP, onde usuários podem registrar-se, fazer login, adicionar seus livros favoritos, e compartilhar suas opiniões através de reviews.

## 🛠️ Tecnologias Utilizadas

- **PHP:** Linguagem de programação principal para o backend.
- **SQLite:** Banco de dados leve e eficiente para armazenamento de dados.
- **HTML/CSS:** Para a estrutura e estilização das páginas web.

## ⚙️ Setup e Configuração do Projeto

Para colocar o Bookwise em funcionamento no seu ambiente local, siga os passos abaixo:

1.  **Clone o Repositório:**

    ```bash
    git clone <URL_DO_REPOSITORIO>
    cd bookwise
    ```

2.  **Iniciar o Servidor PHP:**
    Navegue até o diretório raiz do projeto e execute o seguinte comando no seu terminal:

    ```bash
    php -S localhost:8888 -d auto_prepend_file=server.php -t "public"
    ```

    Isso iniciará um servidor web PHP em `http://localhost:8888`.

3.  **Configuração do Banco de Dados:**
    O projeto utiliza SQLite, e o arquivo `db.sqlite` será criado automaticamente ou já estará presente na pasta `database/`. Não é necessária nenhuma configuração adicional de banco de dados, além de garantir que o PHP tenha permissão para ler e escrever nesse diretório.

## ✨ Funcionalidades

O Bookwise oferece as seguintes funcionalidades principais:

- **Autenticação de Usuários:**
  - **Registro (Cadastro):** Crie uma nova conta de usuário para acessar a plataforma.
  - **Login:** Acesse sua conta com suas credenciais.
  - **Logout:** Encerre sua sessão de forma segura.
- **Gestão de Livros:**
  - **Registro de Livros:** Adicione novos livros à plataforma, com informações como título, autor, descrição, etc.
  - **Visualização de Livros:** Explore a lista de livros disponíveis.
- **Avaliações (Reviews):**
  - **Registro de Reviews:** Escreva e publique suas avaliações sobre os livros.
  - **Visualização de Reviews:** Veja as opiniões de outros usuários sobre os livros.

## 🏗️ Estrutura do Projeto

A arquitetura do projeto segue um padrão MVC (Model-View-Controller) simplificado, com as seguintes pastas e seus propósitos:

- `config.php`: Definições de configuração globais.
- `controllers/`: Contém a lógica de controle para cada rota e ação do usuário.
- `database/`: Gerencia a conexão e operações com o banco de dados SQLite.
- `models/`: Define a estrutura dos dados e a lógica de negócios (interação com o banco de dados).
- `public/`: Contém os arquivos públicos, como `index.php` (ponto de entrada) e assets (imagens).
- `routes.php`: Define as rotas da aplicação e as associa a seus respectivos controladores.
- `utils/`: Utilitários e classes auxiliares, como flash messages e validações.
- `views/`: Contém os templates HTML (páginas) que são renderizados para o usuário.

## 📝 Conclusão

O Bookwise é uma plataforma intuitiva e funcional para quem busca organizar suas leituras e interagir com outros leitores. Esperamos que você aproveite a experiência!

Feito com ❤️ por Israel Jorge
