TYPO3 Content Element: Bootstrap Carousel
===========================================

Extension for TYPO3

**Extension-Key: ot_btcarousel**

**Version: 1.0.3**

## Required

* TYPO3 Version: 11.5 LTS or 12.4 LTS
* Ext:fluid_styled_content
* Bootstrap 5 CSS and JS

The import of the Bootstrap 5 JS/SCSS is required.

Example:

```scss
@import "bootstrap/scss/carousel";
```

The example template use a custom ratio `ratio-slider` for the slider images.
If you use the default ratio (see ext_conf_template.txt) you can add this to your SCSS:

[Bootstrap 5 Documentation](https://getbootstrap.com/docs/5.3/helpers/ratio/#custom-ratios)

Example Code for the custom 1269x450 pixel ratio:

```scss
$aspect-ratios: (
    "1x1": 100%,
    "4x3": calc(3 / 4 * 100%),
    "16x9": calc(9 / 16 * 100%),
    "21x9": calc(9 / 21 * 100%),
    "slider": calc(450 / 1296 * 100%)
);
```

Changelog:

* v1.0.3
  * Compatible with TYPO3 v12.4
  * Preview of the slider images in the TYPO3 backend
