# Forkel OpenGraph
A Facebook "What's on your mind?" clone. This module shows you, how you can fetch OpenGraph data base on a URL from a textarea field. This module is for experimental purposes.

![Forkel OpenGraph  - Preview](https://raw.githubusercontent.com/tobias-forkel/Forkel_OpenGraph/master/preview.jpg)

![Forkel OpenGraph  - Video](https://raw.githubusercontent.com/tobias-forkel/Forkel_OpenGraph/master/video.gif)

## Installation
1. Pull the code.
2. Copy the code in your document root directory where the `/app/` folder is located.
4. Clear all caches and reload your Admin Panel to run the installation process.
5. After installation you should see a new menu in `Forkel > OpenGraph`.
6. You should also find a record `forkel_opengraph_setup` in table `core_resource`. Use `select * from core_resource where code = 'forkel_opengraph_setup';`

## Features
* Enter a text in a textarea field
* JavaScript will detect if you paste or enter a valid URL
* JavaScript will execute a AJAX call to fetch OpenGraph data
* JavaScript will update input fields ( Form.php )

## Usage
The functionality can be used in the backend section `Forkel > OpenGraph`.

## Support
If you have any issues with this extension, open an issue on [Github](https://github.com/tobias-forkel/Forkel_OpenGraph/issues).

## Contributing
1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`.
3. Commit your changes: `git commit -am 'Add some feature'`.
4. Push to the branch: `git push origin my-new-feature`.
5. Submit a pull request.
6. Get a free Twitter post with a link to your portfolio or project.

If you need a custom build, just contact me on http://www.tobiasforkel.de. Follow me on [GitHub](https://github.com/tobias-forkel) and [Twitter](https://twitter.com/tobiasforkel). If I was able to help you, please [PayPal](https://www.paypal.me/TobiasForkel) me that I can buy something to eat.

## History
===== 1.0.0 =====
* Initial version of this module

## License
[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)
