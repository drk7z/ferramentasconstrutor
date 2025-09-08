# Sistema de Gerenciamento de Usuários

Um sistema completo de gerenciamento de usuários desenvolvido em PHP com interface responsiva usando Bootstrap 5.

## 📋 Funcionalidades

- **Autenticação de Usuários**: Login seguro com geração de tokens de autenticação
- **Cadastro de Usuários**: Formulário de criação de contas com validação
- **Recuperação de Senha**: Sistema de recuperação de senha por e-mail
- **Gerenciamento de Usuários**: Interface para visualizar, editar e deletar usuários
- **Dashboard Administrativo**: Painel principal com métricas e navegação
- **Design Responsivo**: Interface adaptável para dispositivos móveis e desktop
- **Proteção de Sessão**: Sistema de segurança com validação de tokens

## 🛠️ Tecnologias Utilizadas

- **Backend**: PHP 7+
- **Banco de Dados**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript
- **Framework CSS**: Bootstrap 5.3.0
- **Ícones**: Font Awesome 6.0.0

## 📁 Estrutura do Projeto

```
/
├── index.php              # Página principal (Dashboard)
├── login/
│   ├── login.php          # Página de login
│   ├── signup.php         # Página de cadastro
│   ├── recover.php        # Página de recuperação de senha
│   ├── logout.php         # Script de logout
│   ├── edit_users.php     # Gerenciamento de usuários
│   ├── edit_user.php      # Edição individual de usuário
│   ├── config.php         # Configuração do banco de dados
│   ├── database.sql       # Script de criação do banco
│   ├── styles.css         # Estilos personalizados
│   ├── script.js          # JavaScript para login
│   ├── recover.js         # JavaScript para recuperação
│   └── signup.js          # JavaScript para cadastro
└── README.md              # Este arquivo
```

## 🚀 Instalação e Configuração

### Pré-requisitos

- Servidor web (Apache/Nginx)
- PHP 7.0 ou superior
- MySQL 5.7 ou superior
- Navegador web moderno

### Passos de Instalação

1. **Clone ou baixe o projeto** para o diretório raiz do seu servidor web

2. **Configure o banco de dados**:
   - Crie um banco de dados MySQL chamado `login-teste`
   - Execute o script `login/database.sql` para criar a tabela `users`

3. **Configure a conexão**:
   - Edite o arquivo `login/config.php`
   - Atualize as credenciais do banco de dados se necessário

4. **Permissões**:
   - Certifique-se de que o servidor web tem permissões de leitura/escrita nos arquivos

## 📖 Como Usar

### Como Executar Localmente

Para executar o website localmente no Windows, siga estes passos:

1. **Instale o PHP e MySQL** (se não tiver):
   - Baixe e instale o XAMPP (https://www.apachefriends.org/) que inclui Apache, PHP e MySQL
   - Ou instale PHP separadamente via Chocolatey: `choco install php`
   - Instale MySQL via Chocolatey: `choco install mysql`

2. **Configure o Banco de Dados**:
   - Inicie o MySQL (se usando XAMPP, inicie o painel de controle)
   - Crie o banco de dados: Abra o terminal e execute:
     ```
     mysql -u root -p
     CREATE DATABASE login-teste;
     exit;
     ```
   - Importe a tabela: No terminal, navegue até a pasta do projeto e execute:
     ```
     mysql -u root -p login-teste < login/database.sql
     ```

3. **Execute o Servidor PHP**:
   - Abra o terminal no diretório raiz do projeto (c:/vscode)
   - Execute o comando:
     ```
     php -S localhost:8000
     ```
   - O servidor estará rodando em http://localhost:8000

4. **Acesse o Website**:
   - Abra o navegador e vá para http://localhost:8000/index.php

### Navegação no Sistema

1. **Acesse o sistema**:
   - Abra seu navegador e vá para `http://localhost:8000/index.php`

2. **Login**:
   - Se não estiver logado, será redirecionado para `login/login.php`
   - Use credenciais válidas ou crie uma nova conta

3. **Navegação**:
   - Use o menu superior para navegar entre seções
   - Dashboard: Visão geral do sistema
   - Usuários: Gerenciamento de contas
   - Configurações: (Em desenvolvimento)

4. **Gerenciamento de Usuários**:
   - Acesse "Editar" no menu Usuários
   - Visualize a lista de usuários
   - Clique em "Editar" para modificar dados
   - Use "Deletar" para remover usuários

## 🔐 Segurança

- Senhas criptografadas com `password_hash()`
- Tokens de autenticação únicos por sessão
- Validação de sessão em todas as páginas protegidas
- Proteção contra acesso não autorizado

## 📱 Responsividade

O sistema é totalmente responsivo e funciona bem em:
- Desktop (1920px+)
- Tablet (768px - 1199px)
- Mobile (até 767px)

## 🐛 Solução de Problemas

### Problemas Comuns

1. **Erro de conexão com banco de dados**:
   - Verifique as credenciais em `config.php`
   - Certifique-se de que o MySQL está rodando

2. **Página não carrega**:
   - Verifique se o PHP está instalado e configurado
   - Confirme as permissões dos arquivos

3. **Login não funciona**:
   - Verifique se a tabela `users` foi criada
   - Confirme se há usuários cadastrados

## 🤝 Contribuição

Para contribuir com o projeto:

1. Faça um fork do repositório
2. Crie uma branch para sua feature (`git checkout -b feature/nova-feature`)
3. Commit suas mudanças (`git commit -am 'Adiciona nova feature'`)
4. Push para a branch (`git push origin feature/nova-feature`)
5. Abra um Pull Request

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo `LICENSE` para mais detalhes.

## 📞 Suporte

Para suporte ou dúvidas:
- Abra uma issue no repositório
- Verifique a documentação no código
- Consulte os logs de erro do servidor

---

**Desenvolvido com ❤️ usando PHP e Bootstrap**
