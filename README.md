# magento-city-dropdown
This package is designed to display the city for a specific region during checkout. Additionally, you can obtain the city list of a specific region through GraphQL.

Also, this package is compatible with Magento 2.4 version. This package originally belongs to the https://github.com/EaDesgin/Magento2-City-Dropdown, I have made package compatible with the latest version and added graphql api to fetch list of city for a specific regions.

Magento 2 City Dropdown
City Dropdown for Magento 2 was created to allow users / merchants to include cities and region / state / province as a dropdown in the checkout process, but more recently when you save a new address, this option is also found there.
With this you can import the cities of each region and you can use them as a dropdown in different processes (checkout, new address etc).
Requirements:
Magento 2.x
Composer
Configuration:
To install the extension, use the composer, then go to Admin → Store → Configuration → Eadesign Settings → RomCity to activate it.
Once it has been activated, it is necessary to import the cities for each region. To import cities you must have a list of cities if you do it in the following way:
Go to Manage City List and click the "Go to Import cities" button and load the csv file and then import.
After upload file.csv go to save, then push the button ''Import cities!"
For the list of cities in Romania, go to project in dir/ Example and download file then go to import.
