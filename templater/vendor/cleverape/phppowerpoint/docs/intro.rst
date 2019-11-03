.. _intro:

Introduction
============

PHPPowerPoint is a library written in pure PHP that provides a set of 
classes to write to different presentation file formats, i.e. Microsoft 
`Office Open XML <http://en.wikipedia.org/wiki/Office_Open_XML>` 
(.pptx) and OASIS `Open Document Format for Office Applications 
<http://en.wikipedia.org/wiki/OpenDocument>`__ (.odp). 

PHPPowerPoint is an open source project licensed under the terms of `LGPL
version 3 <https://github.com/PHPOffice/PHPPowerPoint/blob/develop/COPYING.LESSER>`__.
PHPPowerPoint is aimed to be a high quality software product by incorporating
`continuous integration <https://travis-ci.org/PHPOffice/PHPPowerPoint>`__ and
`unit testing <http://phpoffice.github.io/PHPPowerPoint/coverage/develop/>`__.
You can learn more about PHPPowerPoint by reading this Developers'
Documentation and the `API Documentation <http://phpoffice.github.io/PHPPowerPoint/docs/develop/>`__.

Features
--------

- Create an in-memory presentation representation
- Set presentation meta data (author, title, description, etc)
- Add slides from scratch or from existing one
- Supports different fonts and font styles
- Supports different formatting, styles, fills, gradients
- Supports hyperlinks and rich-text strings
- Add images with different styles (positioning, rotation, shadow)
- Set printing options (header, footer, page margins, paper size, orientation)
- Output to different file formats: PowerPoint 2007 (.pptx), OpenDocument Presentation (.odp), Serialized Spreadsheet)
- ... and lots of other things!

File formats
------------

Below are the supported features for each file formats.

Writers
~~~~~~~

+---------------------------+----------------------+--------+-------+-------+-------+
| Features                  |                      | PPTX   | ODP   | HTML  | PDF   |
+===========================+======================+========+=======+=======+=======+
| **Document Properties**   | Standard             | ✓      |       |       |       |
+---------------------------+----------------------+--------+-------+-------+-------+
|                           | Custom               |        |       |       |       |
+---------------------------+----------------------+--------+-------+-------+-------+
| **Element Shape**         | Image                | ✓      | ✓     |       |       |
+---------------------------+----------------------+--------+-------+-------+-------+
|                           | Hyperlink            |        |       |       |       |
+---------------------------+----------------------+--------+-------+-------+-------+
|                           | Line                 | ✓      | ✓     |       |       |
+---------------------------+----------------------+--------+-------+-------+-------+
|                           | MemoryImage          | ✓      | ✓     |       |       |
+---------------------------+----------------------+--------+-------+-------+-------+
|                           | RichText             |        |       |       |       |
+---------------------------+----------------------+--------+-------+-------+-------+
|                           | Table                |        |       |       |       |
+---------------------------+----------------------+--------+-------+-------+-------+
|                           | Text                 |        |       |       |       |
+---------------------------+----------------------+--------+-------+-------+-------+
| **Charts**                | Bar3D                |        |       |       |       |
+---------------------------+----------------------+--------+-------+-------+-------+
|                           | Line                 |        |       |       |       |
+---------------------------+----------------------+--------+-------+-------+-------+
|                           | Pie3D                |        |       |       |       |
+---------------------------+----------------------+--------+-------+-------+-------+
|                           | Scatter              |        |       |       |       |
+---------------------------+----------------------+--------+-------+-------+-------+

Readers
~~~~~~~
+---------------------------+----------------------+--------+-------+-------+-------+
| Features                  |                      | PPTX   | ODP   | HTML  | PDF   |
+===========================+======================+========+=======+=======+=======+
| **Document Properties**   | Standard             |        |       |       |       |
+---------------------------+----------------------+--------+-------+-------+-------+
|                           | Custom               |        |       |       |       |
+---------------------------+----------------------+--------+-------+-------+-------+
| **Element Shape**         | Image                |        |       |       |       |
+---------------------------+----------------------+--------+-------+-------+-------+
|                           | Hyperlink            |        |       |       |       |
+---------------------------+----------------------+--------+-------+-------+-------+
|                           | RichText             |        |       |       |       |
+---------------------------+----------------------+--------+-------+-------+-------+
|                           | Table                |        |       |       |       |
+---------------------------+----------------------+--------+-------+-------+-------+
|                           | Text                 |        |       |       |       |
+---------------------------+----------------------+--------+-------+-------+-------+
| **Charts**                | Bar3D                |        |       |       |       |
+---------------------------+----------------------+--------+-------+-------+-------+
|                           | Line                 |        |       |       |       |
+---------------------------+----------------------+--------+-------+-------+-------+
|                           | Pie3D                |        |       |       |       |
+---------------------------+----------------------+--------+-------+-------+-------+
|                           | Scatter              |        |       |       |       |
+---------------------------+----------------------+--------+-------+-------+-------+

Contributing
------------

We welcome everyone to contribute to PHPPowerPoint. Below are some of the
things that you can do to contribute:

-  Read `our contributing
   guide <https://github.com/PHPOffice/PHPPowerPoint/blob/master/CONTRIBUTING.md>`__
-  `Fork us <https://github.com/PHPOffice/PHPPowerPoint/fork>`__ and `request
   a pull <https://github.com/PHPOffice/PHPPowerPoint/pulls>`__ to the
   `develop <https://github.com/PHPOffice/PHPPowerPoint/tree/develop>`__
   branch
-  Submit `bug reports or feature
   requests <https://github.com/PHPOffice/PHPPowerPoint/issues>`__ to GitHub
-  Follow `@PHPOffice <https://twitter.com/PHPOffice>`__ on Twitter
