@extends('layout')
@section('content')

<div class="data-table-container">
    <div class="data-table-controls">
      <label for="show-entries">Show</label>
      <select id="show-entries">
        <option>10</option>
        <option>25</option>
        <option>50</option>
        <option>100</option>
      </select>
      <span>entries</span>
      <span style="flex:1"></span>
      <label for="search">Search:</label>
      <input type="search" id="search" placeholder="">
    </div>
    <table>
      <thead>
        <tr>
          <th>EmpCode</th>
          <th>EmpName</th>
          <th>Department/Campaign</th>
          <th>Result</th>
          <th></th>
        </tr>
      </thead>
      <tbody id="table-body">
        <!-- Data rows will be inserted here by JavaScript -->
         <tr><td></td><td>A</td><td>B</td><td>C</td><td>D</td></tr>
            <tr><td>1</td><td>Restrained</td><td>Forceful</td><td>Careful</td><td>Expressive</td></tr>
            <tr><td>2</td><td>Pioneering</td><td>Correct</td><td>Exciting</td><td>Satisfied</td></tr>
            <tr><td>3</td><td>Willing</td><td>Animated</td><td>Bold</td><td>Precise</td></tr>
            <tr><td>4</td><td>Argumentative</td><td>Doubting</td><td>Indecisive</td><td>Unpredictable</td></tr>
            <tr><td>5</td><td>Respectful</td><td>Outgoing</td><td>Patient</td><td>Daring</td></tr>
            <tr><td>6</td><td>Persuasive</td><td>Self-reliant</td><td>Logical</td><td>Gentle</td></tr>
            <tr><td>7</td><td>Cautious</td><td>Even-tempered</td><td>Decisive</td><td>Life of the Party</td></tr>
            <tr><td>8</td><td>Popular</td><td>Assertive</td><td>Perfectionist</td><td>Generous</td></tr>
            <tr><td>9</td><td>Colorful</td><td>Modest</td><td>Easy going</td><td>Unyielding</td></tr>
            <tr><td>10</td><td>Systematic</td><td>Optimistic</td><td>Persistent</td><td>Accommodating</td></tr>
            <tr><td>11</td><td>Relentless</td><td>Humble</td><td>Neighborly</td><td>Talkative</td></tr>
            <tr><td>12</td><td>Friendly</td><td>Observant</td><td>Playful</td><td>Strong-willed</td></tr>
            <tr><td>13</td><td>Charming</td><td>Adventurous</td><td>Disciplined</td><td>Deliberate</td></tr>
            <tr><td>14</td><td>Restrained</td><td>Steady</td><td>Aggressive</td><td>Attractive</td></tr>
            <tr><td>15</td><td>Enthusiastic</td><td>Analytical</td><td>Sympathetic</td><td>Determined</td></tr>
            <tr><td>16</td><td>Commanding</td><td>Impulsive</td><td>Slow-paced</td><td>Critical</td></tr>
            <tr><td>17</td><td>Consistent</td><td>Forceful</td><td>Lively</td><td>Laid-back</td></tr>
            <tr><td>18</td><td>Influential</td><td>Kind</td><td>Independent</td><td>Orderly</td></tr>
            <tr><td>19</td><td>Idealistic</td><td>Popular</td><td>Pleasant</td><td>Out spoken</td></tr>
            <tr><td>20</td><td>Impatient</td><td>Serious</td><td>Procrastinator</td><td>Emotional</td></tr>
            <tr><td>21</td><td>Competing</td><td>Spontaneous</td><td>Loyal</td><td>Thoughtful</td></tr>
            <tr><td>22</td><td>Self-sacrificing</td><td>Considerate</td><td>Convincing</td><td>Courageous</td></tr>
            <tr><td>23</td><td>Dependent</td><td>Inconsistent</td><td>Submissive</td><td>Pushy</td></tr>
            <tr><td>24</td><td>Tolerant</td><td>Conventional</td><td>Stimulating</td><td>Directing</td></tr>
        <tr class="total-row">
                <td class="no-border">Total</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="disc-row">
                <th class="no-border"></th>
                <th>D</th>
                <th>I</th>
                <th>S</th>
                <th>C</th>
            </tr>
      </tbody>
    </table>
    <div class="table-footer">
      <div id="table-info" class="table-info"></div>
      <div id="pagination" class="pagination"></div>
    </div>
  </div>
  <script src="data.js"></script>
</div>




@endsection

@section('footer-scripts')


@endsection