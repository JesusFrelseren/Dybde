<?xml version="1.0" ?>
<xsl:transform
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    version="1.0">
    <xsl:template match="/vanndata">
        <xsl:copy>
            <xsl:copy-of select="document('historisk.xml')" />
            <xsl:copy-of select="document('vannstand.xml')" />
        </xsl:copy>
    </xsl:template>
</xsl:transform>