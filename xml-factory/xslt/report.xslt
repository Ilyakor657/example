<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="report">
  <html>
    <body>
      <xsl:choose>
        <xsl:when test="subject = 'legal'">
          <div style="font-size: 18px;">
            <xsl:for-each select="chief">
              <span style="display: inline-block; margin-bottom: 10px;">
                ФИО:&#160;
                <xsl:value-of select="surname"/>&#160;
                <xsl:value-of select="name"/>&#160;
                <xsl:value-of select="patronymic"/>
              </span><br></br>
              <span style="display: inline-block; margin-bottom: 10px;">ИНН:&#160;<xsl:value-of select="inn"/></span><br></br>
            </xsl:for-each>
            <xsl:for-each select="org">
              <span style="display: inline-block; margin-bottom: 10px;">Название организации:&#160;<xsl:value-of select="nameOrg"/></span><br></br>
              <span style="display: inline-block; margin-bottom: 10px;">ОГРН:&#160;<xsl:value-of select="ogrn"/></span><br></br>
              <span style="display: inline-block; margin-bottom: 10px;">ИНН:&#160;<xsl:value-of select="innOrg"/></span><br></br>
              <span style="display: inline-block; margin-bottom: 10px;">КПП:&#160;<xsl:value-of select="kpp"/></span><br></br>
              <xsl:for-each select="address">
                <span style="display: inline-block; margin-bottom: 10px;">
                  Адрес:<br></br>
                  <xsl:value-of select="region"/>,&#160;
                  г.&#160;<xsl:value-of select="city"/>,&#160;
                  ул.&#160;<xsl:value-of select="street"/>&#160;
                  <xsl:value-of select="house"/>&#160;
                </span><br></br>
              </xsl:for-each>
            </xsl:for-each>
          </div>
        </xsl:when>
        <xsl:otherwise>
          <div style="font-size: 18px;">
            <xsl:for-each select="client">
              <span style="display: inline-block; margin-bottom: 10px;">
                ФИО:&#160;
                <xsl:value-of select="surname"/>&#160;
                <xsl:value-of select="name"/>&#160;
                <xsl:value-of select="patronymic"/>
              </span><br></br>
              <span style="display: inline-block; margin-bottom: 10px;">Дата рождения:&#160;<xsl:value-of select="dateBirth"/></span><br></br> 
              <span style="display: inline-block; margin-bottom: 10px;">ИНН:&#160;<xsl:value-of select="inn"/></span><br></br>
              <xsl:for-each select="passport">
                <span style="display: inline-block; margin-bottom: 10px;">Cерия:&#160;<xsl:value-of select="serial"/></span><br></br>
                <span style="display: inline-block; margin-bottom: 10px;">Номер:&#160;<xsl:value-of select="number"/></span><br></br>
                <span style="display: inline-block; margin-bottom: 10px;">Дата выдачи:&#160;<xsl:value-of select="dateIssue"/></span><br></br>
              </xsl:for-each>
            </xsl:for-each>
          </div> 
        </xsl:otherwise>
      </xsl:choose>
    </body>
  </html>
</xsl:template>
</xsl:stylesheet>