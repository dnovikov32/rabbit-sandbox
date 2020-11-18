## Rabbitmq Sandbox

### Commands
  
Add the message to bus
```bash 
$ php bin/console add-message test1
```

Start handlers
```bash 
$ php bin/console messenger:consume
```

### Rabbitmq Management  
http://localhost:15672  
rabbit / rabbit