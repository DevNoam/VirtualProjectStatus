This is a PHP Static website to show the server status for the developers.

In the Unity project there is a script called 'ServerStatus.cs', this script pings every 2 minutes Information about the Server and the amount of active players
to a web server (where I decide to host this files).


Because PlayFab cannot tack my servers information directly (And because playfab 'Charges' for this requests), I've made a dashboard
to track the Server status.
This Dashboard can also be accesable by Voice assistants to track status by voice commands.


The url inside the unity project ('ServerStatus.cs') should direct to the file 'PostConnectedPlayers.php', for example https://virtualproject.com/status/PostConnectedPlayers.php/

The 'ConnectedPlayers.txt' is the file that contains the status of the server.
If the file is 2 minutes old (Means the file haven't been updated for 2 minutes or more), there status page will be set to Offline mode (Because server haven't pinged for 2 Minutes).
This can be changed in the 'Index.php' file & in the Project, if there is need to increase this value.



index.php = The status page which accesable to view.
PostConnectedPlayers.php = File that our Unity Project broadcast the information to, this is not encrypted file and can be hacked by anyone with this file url, keep it secret.
ConnectedPlayers.txt = A text file with the server Information.
ProjectLogo = Dashboard image.
README = This file.
Style.css = Style file for the index.php