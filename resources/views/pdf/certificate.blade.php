<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>file_1659870468092</title>
  <style type="text/css">
    * {
      margin: 0;
      padding: 0;
      text-indent: 0;
    }

    h1 {
      color: black;
      font-family: Calibri, sans-serif;
      font-style: normal;
      font-weight: bold;
      text-decoration: none;
      font-size: 11pt;
    }

    .s1 {
      color: black;
      font-family: Calibri, sans-serif;
      font-style: normal;
      font-weight: bold;
      text-decoration: none;
      font-size: 11pt;
    }

    .s2 {
      color: black;
      font-family: Calibri, sans-serif;
      font-style: normal;
      font-weight: normal;
      text-decoration: none;
      font-size: 11pt;
    }

    .s3 {
      color: black;
      font-family: Arial, sans-serif;
      font-style: normal;
      font-weight: bold;
      text-decoration: none;
      font-size: 11pt;
    }

    p {
      color: black;
      font-family: Calibri, sans-serif;
      font-style: normal;
      font-weight: normal;
      text-decoration: none;
      font-size: 11pt;
      margin: 0pt;
    }

    .s4 {
      color: black;
      font-family: Arial, sans-serif;
      font-style: normal;
      font-weight: bold;
      text-decoration: none;
      font-size: 11pt;
    }

    table,
    tbody {
      vertical-align: top;
      overflow: visible;
    }

    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
    }

    .page-break {
      page-break-after: always;
    }
  </style>
</head>

<body style="padding-left: 28.3464567pt; padding-right: 28.3464567pt">
  <!-- center text -->
  @foreach ($certificates as $certificate)
  <h1 style="padding-top: 70pt; text-align:center;">Tuguegarao City, Cagayan
    <br> Senior High School
  </h1>
  <h1 style="padding-top: 1pt; text-align:center;">{{ $certificate['school_year'] }}</h1>
  <p style="text-indent: 0pt;text-align: left;"><br /></p>
  <h1 style="text-indent: 0pt;text-align: center;">{{ $certificate['title'] }}</h1>
  <p style="text-indent: 0pt;text-align: left;"><br /></p>
  <table style="width: 100%;">
    <tr>
      <td>
        <h1 style="padding-left: 5pt;text-indent: 0pt;text-align: left;">STUDENT’S NAME: {{ $certificate['name'] }}</h1>
      </td>
      <td>
        <h1 style="padding-left: 5pt;text-indent: 0pt;text-align: left;">{{ $certificate['grade_section']  }}</h1>
      </td>
    </tr>
  </table>
  <p style="padding-left: 5pt;text-indent: 0pt;text-align: left;" />
  <p style="text-indent: 0pt;text-align: left;"><br /></p>
  @foreach($certificate['melcs'] as $melcs)
  <table style="width: 100%" cellspacing="0">
    <tr style="height:15pt">
      <td rowspan="2" style="width: 45%">
        <p class="s1" style="padding-top: 7pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">MELC</p>
      </td>
      <td>
        <p class="s1" style="line-height: 12pt;text-align: center;">Week {{ $loop->index + 1}}
        </p>
      </td>
      <td rowspan="2" style="width: 30%">
        <p class="s1" style="padding-top: 7pt; text-align: center;">
          Descriptor</p>
      </td>
    </tr>
    <tr style="height:15pt">
      <td>
        <p class="s1" style="line-height: 13pt;text-align: center;">
          Processing</p>
      </td>
    </tr>
    <tr style="height:41pt">
      <td style="width: 45%">
        <p class="s2" style="padding-left: 5pt;text-indent: 0pt;line-height: 14pt;text-align: left;">
          {{ ($loop->index + 1). '. '. $melcs['description'] }}
        </p>
      </td>
      <td>
        <p style="text-align: center;"><br /></p>
        <p class="s3" style="text-align: center;">{{ $melcs['score'] }}</p>
      </td>
      <td style="width: 30%">
        <p class="s3" style="padding-top: 7pt; text-align: center;">{{ $melcs['interpretation'] }}</p>
      </td>
    </tr>
  </table>
  <br />
  @endforeach
  <p style="padding-top: 2pt;padding-left: 19pt;text-indent: -8pt;text-align: left;">0 – No chance to observe</p>
  <p style="padding-top: 2pt;padding-left: 19pt;text-indent: -8pt;text-align: left;">1 – Needs improvement</p>
  <p style="padding-top: 2pt;padding-left: 19pt;text-indent: -8pt;text-align: left;">2 – Developing</p>
  <p style="padding-top: 2pt;padding-left: 19pt;text-indent: -8pt;text-align: left;">3 – Sufficiently developed</p>
  <p style="padding-top: 2pt;padding-left: 19pt;text-indent: -8pt;text-align: left;">4 – Developed and commendable</p>
  <p style="text-indent: 0pt;text-align: left;"><br /></p>

  <p style="padding-left: 11pt;text-indent: 0pt;text-align: left;">Prepared by:</p>
  <p style="text-indent: 0pt;text-align: left;"></p>
  <img width="87" height="55" src="{{ public_path($certificate['signature'])}}" />
  <p class="s4" style="padding-left: 11pt;text-indent: 0pt;text-align: left;">{{ $certificate['adviser'] }}</p>
  <p style="padding-left: 11pt;text-indent: 0pt;text-align: left;">Class Adviser</p>
  <div class="page-break"></div>
  @endforeach
</body>

</html>