# Chatbots with PHP + IA
Chat Bots intro for the PHP Jalisco User Group

## Intro

This bot leverages [api.ia](https://api.ai/) for a better conversational understanding. You will need an account to get a
developer key. Register an ***Agent*** (this bot) and get it from  the API keys section. 

### Getting started

1. Make sure you've checked out the [previous][1] branch for a basic intro.
2. Your Telegram Bot should already be registered with the BotFather. 
Set the environment variable `TELEGRAM_TOKEN` or update `$TELEGRAM_TOKEN` accordingly.
3. Set the environment variable `API_AI_DEVELOPER_TOKEN` or update `$API_AI_DEVELOPER_TOKEN` with your **Developer access token** from api.ia. 
4. Start the bot
 ```bash
 php -S 0.0.0.0:7777 bot.php
 ```
5. Add even more magic to your Bot.  


### Notes
- The URL that ngrok provides was registered as a step in the [intro][1]. If it changed (i.e. you restarted ngrok)
you will need to register the new URL again see [here](https://github.com/eduardoromero/phpjalisco-chatbots/blob/intro/starting-with-webhooks/webhook.php#L15).
  
  
  
[1]: https://github.com/eduardoromero/phpjalisco-chatbots/tree/intro/botman-and-api-ia
[2]: https://github.com/eduardoromero/phpjalisco-chatbots/tree/intro/starting-with-webhooks