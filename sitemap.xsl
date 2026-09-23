<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="2.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:s="http://www.sitemaps.org/schemas/sitemap/0.9">
  <xsl:output method="html" indent="yes" encoding="UTF-8"/>
  <xsl:template match="/">
    <html>
      <head>
        <title>XML Sitemap</title>
        <style>
          body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; color: #333; margin: 2rem; background: #f9f9f9; }
          h1 { font-size: 1.5rem; margin-bottom: 0.5rem; }
          p { color: #666; margin-top: 0; }
          table { width: 100%; border-collapse: collapse; background: #fff; box-shadow: 0 1px 3px rgba(0,0,0,0.1); margin-top: 1.5rem; }
          th, td { padding: 12px 16px; text-align: left; border-bottom: 1px solid #eee; font-size: 0.95rem; }
          th { background: #f4f4f4; font-weight: 600; }
          tr:hover { background: #fafafa; }
          a { color: #0066cc; text-decoration: none; }
          a:hover { text-decoration: underline; }
        </style>
      </head>
      <body>
        <h1>XML Sitemap</h1>
        <p>This sitemap contains <xsl:value-of select="count(s:urlset/s:url)"/> URLs.</p>
        <table>
          <thead>
            <tr>
              <th>URL Location</th>
              <th>Last Modified</th>
            </tr>
          </thead>
          <tbody>
            <xsl:for-each select="s:urlset/s:url">
              <tr>
                <td>
                  <xsl:variable name="itemUrl"><xsl:value-of select="s:loc"/></xsl:variable>
                  <a href="{$itemUrl}" target="_blank"><xsl:value-of select="s:loc"/></a>
                </td>
                <td><xsl:value-of select="s:lastmod"/></td>
              </tr>
            </xsl:for-each>
          </tbody>
        </table>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>