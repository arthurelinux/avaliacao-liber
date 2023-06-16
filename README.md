## API PARA AVALIAÇÃO

- Para executar dê um docker-compose up dentro da pasta docker-avaliacao, caso tenha erro de permissão na primeira execussão. Rode o comando abaixo no container myapp

``chmod 777 -R ../www``

# A aplicação
Consiste em uma API para listagem de e-mails de uma base de e-mails, as rotas podem ser encontradas no SWEGGER. 
Os cadastros do contatos não precisam de autenticação. Porém para consulta precisa de um tolken de validação gerado após o login. 

Na raíz do projeto tem um documento para ser utilizado no insominia que pode ajudar na execussão da API 
