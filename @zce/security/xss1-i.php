<?php
/*

~ XSS Inclusion attack ~

If another web ui on a different server, makes a request to my server for javascript,
- It may be able to access cookie info if the user has visited my web ui before.
- It may also be able to access js variables that are personal to that user

I think this happens because according to the same origin policy
the JavaScript code on my server runs in the same security context as the attackers site.
Because the attackers site made a request for JavaScript on my server it was "Included"... I think.

To help prevent this:
- Don't create global js vars that contain confidential info
- Probably other stuff I don't know yet

*/