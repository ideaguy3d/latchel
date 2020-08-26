<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:param name="owner" select="'Jay Hernandez'"/>
    <xsl:output method="html" encoding="ISO-8859-1" indent="no"/>
    
    <xsl:template match="collection">
        Ello ^_^/ Programmer <xsl:value-of select="$owner"/> presents EDM 
        <xsl:apply-templates/>
    </xsl:template>

    <xsl:template match="cd">
        <h1><xsl:value-of select="title"/></h1>
        <h2>by <xsl:value-of select="artist"/>, <xsl:value-of select="year"/></h2>
    </xsl:template>
</xsl:stylesheet>