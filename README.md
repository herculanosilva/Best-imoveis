## 🚀 Como executar o projeto

1. Instale as dependências com o comando: composer install
2. Copie todo o conteúdo do arquivo .env.example e cole em um novo arquivo com nome .env
3. Defina uma nova chave no seu arquivo .env: php artisan key:generate
4. Defina suas credenciais de banco de dados em seu arquivo .env
5. Executar todas as suas migrações: php artisan migrate
6. Semeie seu banco de dados: php artisan db:seed
7. Execute o servidor: php artisan serve --port=8000 
    - O servidor inciará na porta:8000 
    - acesse http://localhost:8000

### Pré-requisitos

Ter instalado em sua máquina:
PHP, Composer e Postgresql.
