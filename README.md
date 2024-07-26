# Laravel Training App

Uma aplicação Laravel para gerenciar treinamentos corporativos.

## Pré-requisitos

- Docker e Docker Compose
- Composer
- Node.js e npm

## Configuração do Projeto

1. Clone o repositório:
   ```bash
   git clone <URL_DO_REPOSITORIO>

2. Navegue até o diretório do projeto:
bash
Copiar código
cd laravel-training-app

3. Instale as dependências:
bash
Copiar código
composer install
npm install

4. Copie o arquivo .env.example para .env e configure-o com as variáveis apropriadas:
bash
Copiar código
cp .env.example .env
Exemplo de configuração:

dotenv
Copiar código
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_trainning
DB_USERNAME=user_trainning
DB_PASSWORD=admin123

5. Gere a chave da aplicação:
bash
Copiar código
php artisan key:generate

6. Inicie os contêineres Docker:
bash
Copiar código
docker-compose up -d

7. Execute as migrações:
bash
Copiar código
docker-compose exec app php artisan migrate

8. Compile os assets do front-end:
bash
Copiar código
npm run dev

- **Imagem da Aplicação**:
  - Adicionei a linha `![App Screenshot](public/images/training.png)` 