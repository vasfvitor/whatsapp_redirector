<p align="center"><a href="https://heydev.net" target="_blank"><img src="https://prasunnandy.me/heydev/heydev.png" width="400"></a></p>

# WhatsApp Redirector
## About This Application
This is a WhatsApp group redirect system developed using Laravel 8. The functionality of the system is admin and users can create a campaign here with name, icon, and slug. After that user can create unlimited groups for that campaign with a WhatsApp link and how many times the user will be redirected to that WhatsApp link.

Suppose Campaign A has 3 groups. Each group has a 100 redirect limit. So when a group's redirect limit is fulfilled user will redirect to the next group's WhatsApp link. That will occur using a custom URL of the campaign. Suppose the user entered campaign1 as the slug for Campaign A. So the custom URL will be https://example.com/c/campaign1. When the user hits this link system will check which group redirect limit is still available according to the group's creation date then if the system found any left place for redirection BINGO!!! user redirects to that group's WhatsApp URL.
