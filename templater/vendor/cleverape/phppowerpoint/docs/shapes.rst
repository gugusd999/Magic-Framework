.. _shapes:

Shapes
======

Shapes are objects that can be added to a slide. There are five types of shapes that can be used, i.e. [rich text](#rich-text), [line](#line), [chart](#chart), [drawing](#drawing), and [table](#table). Read the corresponding section of this manual for detail information of each shape.

Every shapes have common properties that you can set by using fluent interface.

- ``width`` in pixels
- ``height`` in pixels
- ``offsetX`` in pixels
- ``offsetY`` in pixels
- ``rotation`` in degrees
- ``fill`` see *[Fill](#fill)*
- ``border`` see *[Border](#border)*
- ``shadow`` see *[Shadow](#shadow)*
- ``hyperlink`

Example:

.. code-block:: php
	$richtext = $slide->createRichTextShape()
		->setHeight(300)
		->setWidth(600)
		->setOffsetX(170)
		->setOffsetY(180);

Rich text
-------

Rich text shapes contain paragraphs of texts. To create a rich text shape, use ``createRichTextShape`` method of slide.

Below are the properties that you can set for a rich text shape.

- ``wrap``
- ``autoFit``
- ``horizontalOverflow``
- ``verticalOverflow``
- ``upright``
- ``vertical``
- ``columns``
- ``bottomInset`` in pixels
- ``leftInset`` in pixels
- ``rightInset`` in pixels
- ``topInset`` in pixels

Properties that can be set for each paragraphs are as follow.

- ``alignment`` see *[Alignment](#alignment)*
- ``font`` see *[Font](#font)*
- ``bulletStyle`` see *[Bullet](#bullet)*

Line
-------

To create a line, use `createLineShape` method of slide.

Chart
-------

To create a chart, use `createChartShape` method of slide.

Drawing
-------

To create a drawing, use `createDrawingShape` method of slide.

.. code-block:: php
	$drawing = $slide->createDrawingShape();
	$drawing->setName('Unique name')
		->setDescription('Description of the drawing')
		->setPath('/path/to/drawing.filename');
		
Drawing
-------

To create a table, use `createTableShape` method of slide.

.. code-block:: php
	$table = $slide->createTableShape($columns);	
