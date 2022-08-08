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
      <td rowspan="2">
        <p class="s1" style="padding-top: 7pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">MELC</p>
      </td>
      <td>
        <p class="s1" style="padding-left: 66pt;padding-right: 65pt;text-indent: 0pt;line-height: 12pt;text-align: center;">Week {{ $loop->index + 1}}
        </p>
      </td>
      <td rowspan="2">
        <p class="s1" style="padding-top: 7pt; text-align: center;">
          Descriptor</p>
      </td>
    </tr>
    <tr style="height:15pt">
      <td>
        <p class="s1" style="padding-left: 66pt;padding-right: 65pt;text-indent: 0pt;line-height: 13pt;text-align: center;">
          Processing</p>
      </td>
    </tr>
    <tr style="height:41pt">
      <td>
        <p class="s2" style="padding-left: 5pt;text-indent: 0pt;line-height: 14pt;text-align: left;">
          {{ ($loop->index + 1). '. '. $melcs['description'] }}
        </p>
      </td>
      <td>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p class="s3" style="text-indent: 0pt;text-align: center;">{{ $melcs['score'] }}</p>
      </td>
      <td>
        <p class="s3" style="padding-top: 7pt; text-align: center;">Developed
          and Commendable</p>
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
  <img width="87" height="55" src="data:image/jpg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAMCAgMCAgMDAwMEAwMEBQgFBQQEBQoHBwYIDAoMDAsKCwsNDhIQDQ4RDgsLEBYQERMUFRUVDA8XGBYUGBIUFRT/2wBDAQMEBAUEBQkFBQkUDQsNFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBT/wAARCAA3AFcDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD9Ueckjn2pMAnn8KdSdc4oATgKTnrSnkjHSggdMcU1SAW9u9ADh/nNLSZ5OKKAEU5PofSl6/SjGeMcUmOeKAHUmOKOmMULQABRjpRQSecUUALXO6z8QvDXh/XrXQtQ1/TrbX7yF7i10c3KG+uo0DMzQ24PmSYCN9xT90+lUvF2paneeI9D8NaWt5aLepLe32rwIu21toTGPKDMjr5szyoqqQMxpcsrK8a50/CPgrRPAelNp+hadDp9u8hnmZctLczNjfPNIxLyyvgFpZCzueWYnmtuWMYpz67W/r8PyFe+xz2k/G7wvqwvZHGu6Pa2UElzc3viDw5qOlWsMUYy7tPdQRxgAZOd3QE9Aa4Dx74v8W+KG8L+LfBmp6JqXgmx8SabJDfeHtUlvm1SzmlFleCeONBF5UYuppciRxG1kkjZ5WP3sjNcB48+BHgj4kDU21fRzHcapGINQudLu5tPm1CIIyLDcyW7o1xEFZh5UpZOfu10YepRhUTmnbrs9Oumn5/8CZKVtDqvFGo6hpfhnV73RdMXXNYtrSaay0v7StuLydUJjh81gRHvYKu8ghd2T0rzPwX+0FZaja6WNV26lHqmiNr2lav4etJ5otWtYhCtyyWYD3MM0ck8YNsRIwWWPDuwmWLz/wCB37KPwtuNLHjODQLnQvHVxLd2Gvaj4X17U9Mjnvoblor0RLDcJtt2ubd2SPCjaE+VcYHZQ/sbfCy01O41ay0nUrfV5p7i8Govrd7cTQ3E5Tz7iAzSuIJ38tAZ4gsvyjDggV1Sp4OjOVGcpO3XlS1WjXxPS/Xt0va0JzklJEHjv9qvSfAmpWOrXEWlT/DO4sTcnxcurgeZOk0kdxbQReUUllgEYkeIzJM6iUQxTPC6D3UOOuRg+9eZ2P7Ovgm0f/SYNc1y1PzNp/iHxLqWrWUjbg4Z7a6uJInYMAwZkJVgGBBGal0v9mv4Q6JqNnfad8LPBVjf2cqz211beHrSOWCRW3I6MsYKsCMgjkEVyVXhpJKndW8t/wAdPP8AJbFrm6ka/tP/AAcki8wfFjwOY/73/CR2eP8A0ZW/4X+L3gXxvrdzo3hzxr4d1/WLaNpZ9P0vVYLm4iRWCszRo5ZQGZQSRwSB3rqinsDntVSbRrSfWbXVHiY3ttBLbRSCRgBHI0bONudpyYY+SMjBxjJznKVBxtGLT9U/w5V+Y9S8M96KQNuziiuYo4nxZq2oeHPiJ4SvGI/4RrUI7nSb1lXJjvJDFJZySMeFi/dXMOc5MtzAoU7iV7jvVTVtJsde0u80zUrOC/068he3ubS5jEkU0TqVdHU5DKQSCDwQa4DTrvxF8LRLZanDeeKfB9sjPa6vB5t5qtpGFJEFxAqtJdBdu1Zoy8z70EkbMrzydqisRBRj8UdLd1e/zetrdVaxn8Lu9j0h9235QCcjqccd6Xofc1zvhT4jeFvHJvE0DxDp2rzWLiK8t7S5V5rOTn93PHndE4wco4DAggjIrP8AFfxKtNKupdF0JYfEnjBvLSLQ7a4AaHzA5Sa7cBjbW4EchMrKc7CsayytHE/P7KalyNWfnoXdWuUPhm2pnxZ8VDefaTY/8JNH/Zpm3eX5A0nTg/k54KeeLgHbxvEnfNd7uyB8vB/Oub+HHgofD7wdp+i/azqF2jS3N9fmPy/tl5PK891cbMkR+ZPLLJsU7U37VwABXS7yCMDqO3anWkpTbjtovuVr/PcIqyHrznsfpR0yabkMcZIpcYYHPBFYjDPHH8qMnqOfalAo4HHXvQAfxUUijBHY9TzmigB1NYAA9ue1FFAFHVtD07XrZrfU9PtdRtmBDQ3cKyow7ghgRU1laW2nWcNtaW8VrbQqI4oYUCIigYCqo4AAGABRRTu7WCy3LPBOPzFN6cDr/OiikAM2AD2pf4utFFACbsY3HmnY5oooAPpxRRRQB//Z" />
  <p class="s4" style="padding-left: 11pt;text-indent: 0pt;text-align: left;">{{ $certificate['adviser'] }}</p>
  <p style="padding-left: 11pt;text-indent: 0pt;text-align: left;">Class Adviser</p>
  <div class="page-break"></div>
  @endforeach
</body>

</html>