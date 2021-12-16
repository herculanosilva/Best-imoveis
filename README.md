## 🚀 Como executar o projeto

1. Instale as dependências com o comando: composer install
2. Copie todo o conteúdo do arquivo .env.example e cole em um novo arquivo com nome .env
3. Defina uma nova chave no seu arquivo .env: php artisan key:generate
4. Defina suas credenciais de banco de dados em seu arquivo .env
5. Executar todas as suas migrações: php artisan migrate
6. Semeie seu banco de dados: php artisan db:seed
7. crie um link simbólico de public/storage para storage/app/public: php artisan storage:link
8. Execute o servidor: php artisan serve --port=8000 
    - O servidor inciará na porta:8000 
    - acesse http://localhost:8000

### Pré-requisitos
Ter instalado em sua máquina:
PHP, Composer e Postgresql.

### Sobre
O projeto foi posposto e implementado conforme as aulas ministradas por Luciano Souza em seu canal do YouTube, outras funcionalidades como autentificação de usuário, exportação de dados nos formatos pdf e xlsx, página de dashboard com gráficos e cards, footer na página inicial do site, filtros de cidade, tipos, finalidades e usuários foram implementados posteriormente ao curso, para melhorar o projeto e deixá-lo mais completo.

Fique a vontade para melhorar o sistema. ;)

### Curso Laravel 8 com Materialize

#### Luciano Souza https://www.youtube.com/watch?v=azk28V0gGZk&list=PLlwEQc_2ZyjazgFmo16a3zhiQEll3VbU9

## 🛠 Tecnologias

As seguintes ferramentas foram usadas na construção do projeto:

#### *
-   **[LARAVEL](https://laravel.com/)**
-   **[NodeJS](https://nodejs.org/en/)**
-   **[db-dumper](https://github.com/spatie/db-dumper)**
<!-- -   **[input-mask](https://github.com/RobinHerbots/Inputmask)** -->
-   **[laravel-dompdf](https://github.com/barryvdh/laravel-dompdf)**
-   **[laravel-ui](https://github.com/laravel/ui)**
-   **[Larapex Charts](https://github.com/ArielMejiaDev/larapex-charts)**

## 📝 Licença

