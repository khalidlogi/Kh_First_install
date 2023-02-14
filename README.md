# Kh_First_install

Kh_First_install is a WordPress plugin that allows you to modify the server settings for file uploads and execution times.

# Features
- Modifies the **.htaccess** file to set **upload_max_filesize**, **post_max_size**, **max_execution**_time, and **max_input_time** values.
Uses **register_activation_hook** to set the values on plugin activation.
Uses **admin_notices** hook to show an admin notice with the current upload_max_filesize after plugin activation.
Uses **register_deactivation_hook** to delete the values on plugin deactivation.
Only executes the **.htaccess** modification once, to avoid issues with repeated modifications.

## Installation
Download the custom-plugin directory and upload it to the /wp-content/plugins/ directory on your WordPress installation.
Activate the plugin through the 'Plugins' menu in WordPress.

## Usage
Custom Plugin will automatically modify your .htaccess file to set the specified values when the plugin is activated. If you ever need to deactivate the plugin and remove the changes to your .htaccess file, simply deactivate the plugin and the values will be removed.

## Support
If you encounter any issues or have questions about Custom Plugin, please open an issue on the [GitHub repository](https://github.com/khalidlogi/) or contact the developer directly.
