<?xml version="1.0" encoding="utf-8" ?> 
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"> 
  <xsl:param name="titles" /> 
  <xsl:template match="/articles"> 
    <h2><xsl:value-of select="$titles" /></h2> 
    <xsl:for-each select=".//title"> 
      <h3><xsl:value-of select="." /></h3> 
    </xsl:for-each> 
  </xsl:template> 
</xsl:stylesheet> 