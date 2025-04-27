<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Barangay Information System</title>
    <link
      rel="preload"
      href="<?= base_url('assets/fonts/Roboto-Regular.ttf') ?>"
      as="font"
      type="font/ttf"
      crossorigin="anonymous"
    />
    <link
      rel="preload"
      href="<?= base_url('assets/fonts/Roboto-Bold.ttf') ?>"
      as="font"
      type="font/ttf"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="/assets/css/general.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/sidebar.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/header.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/reusables.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard-responsive.css') ?>" />
    <script src="<?= base_url('assets/js/apexcharts.min.js') ?>"></script>
    <style>
      /* Analytics styles */
      :root {
        --primary-color: #0d9275;
        --text-color: #1f2937;
        --text-muted: #6b7280;
        --border-color: #e5e7eb;
        --card-bg: #ffffff;
        --body-bg: #f9fafb;
        --green: #10b981;
        --red: #ef4444;
        --gray: #9ca3af;
      }

      /* Analytics Header */
      .analytics-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
      }

      .analytics-header h1 {
        font-size: 1.875rem;
        font-weight: 700;
        letter-spacing: -0.025em;
      }

      .print-button {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background-color: var(--primary-color);
        color: white;
        border: none;
        border-radius: 0.375rem;
        font-size: 1.6rem;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.2s;
      }

      .print-button:hover {
        background-color: #4338ca;
      }

      .icon {
        width: 2rem;
        height: 2rem;
      }

      /* Analytics Content */
      .analytics-content {
        background-color: var(--body-bg);
        border-radius: 0.5rem;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
      }

      /* Tabs */
      .tabs {
        margin-bottom: 1.5rem;
      }

      .tabs-list {
        display: flex;
        border-bottom: 1px solid var(--border-color);
        margin-bottom: 1.5rem;
      }

      .tab-button {
        padding: 0.75rem 1rem;
        background: none;
        border: none;
        border-bottom: 2px solid transparent;
        font-size: 1.6rem;
        font-weight: 500;
        color: var(--text-muted);
        cursor: pointer;
        transition: color 0.2s, border-color 0.2s;
      }

      .tab-button.active {
        color: var(--primary-color);
        border-bottom-color: var(--primary-color);
      }

      .tab-content {
        display: none;
      }

      .tab-content.active {
        display: block;
      }

      /* Cards */
      .card-grid {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 1rem;
      }

      @media (min-width: 48rem) {
        .card-grid {
          grid-template-columns: repeat(2, 1fr);
        }
      }

      @media (min-width: 64rem) {
        .card-grid {
          grid-template-columns: repeat(4, 1fr);
        }
      }

      .card-grid-2 {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 1rem;
      }

      @media (min-width: 48rem) {
        .card-grid-2 {
          grid-template-columns: repeat(2, 1fr);
        }
      }

      .analytics-card {
        background-color: var(--card-bg);
        border-radius: 0.5rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        overflow: hidden;
      }

      .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 1rem 0.5rem 1rem;
      }

      .card-header h3 {
        font-size: 1.6rem;
        font-weight: 500;
        color: var(--text-color);
      }

      .card-header p {
        font-size: 1.6rem;
        color: var(--text-muted);
        margin-top: 0.25rem;
      }

      .card-content {
        padding: 0.5rem 1rem 1rem 1rem;
      }

      .stat-value {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
      }

      .stat-description {
        font-size: 1.4rem;
        color: var(--text-muted);
      }

      .stat-list {
        display: flex;
        flex-direction: column;
        gap: 1.4rem;
      }

      .stat-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .stat-label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
      }

      .color-dot {
        width: 0.75rem;
        height: 0.75rem;
        border-radius: 50%;
      }

      .green {
        background-color: var(--green);
      }

      .red {
        background-color: var(--red);
      }

      .gray {
        background-color: var(--gray);
      }

      .stat-number {
        font-weight: 500;
      }

      .card-footer {
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1px solid var(--border-color);
        font-size: 1.6rem;
        color: var(--text-muted);
      }

      /* Print specific elements */
      .print-header, .print-footer {
        display: none;
      }

      .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        display: none;
      }

      /* Print styles */
      @media print {
        body * {
          visibility: hidden;
        }
        
        #printArea, #printArea * {
          visibility: visible;
        }
        
        #printArea {
          position: absolute;
          left: 0;
          top: 0;
          width: 100%;
          background-color: white;
          padding: 2rem;
        }

        .print-button, .tabs-list {
          display: none !important;
        }

        .print-header, .print-footer {
          display: block;
          text-align: center;
          margin: 1.5rem 0;
        }

        .print-header h1 {
          font-size: 1.875rem;
          margin-bottom: 0.5rem;
        }

        .print-footer {
          margin-top: 2rem;
          padding-top: 1rem;
          border-top: 1px solid var(--border-color);
          font-size: 1.6rem;
          color: var(--text-muted);
        }

        .tab-content {
          display: block !important;
          margin-bottom: 2rem;
        }

        .section-title {
          display: block;
        }

        /* Adjust card grid for print */
        .card-grid, .card-grid-2 {
          page-break-inside: avoid;
          break-inside: avoid;
        }

        .analytics-card {
          break-inside: avoid;
          page-break-inside: avoid;
        }
      }
      .container {
        margin-bottom: 45rem;
      }
    </style>
  </head>
  <body>
    <?= view('includes/sidebar') ?>
    <main>
      <!-- header -->
      <?= view('includes/header.php') ?>
      <div class="container">
        <!-- Analytics content starts here -->
        <div class="analytics-header">
          <h1>Analytics Dashboard</h1>
          <button id="printButton" class="print-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
              <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
              <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
              <line x1="9" y1="9" x2="15" y2="9"></line>
              <line x1="9" y1="13" x2="15" y2="13"></line>
              <line x1="9" y1="17" x2="15" y2="17"></line>
            </svg>
            Print Report
          </button>
        </div>

        <div id="printArea" class="analytics-content">
          <div class="print-header">
            <h1>Analytics Report</h1>
            <p class="generated-date">Generated on <span id="currentDate"></span></p>
          </div>

          <div class="tabs">
            <div class="tabs-list">
              <button class="tab-button active" data-tab="overview">Overview</button>
              <button class="tab-button" data-tab="demographics">Demographics</button>
              <button class="tab-button" data-tab="cases">Cases</button>
            </div>

            <div class="tab-content active" id="overview">
              <div class="card-grid">
                <div class="analytics-card">
                  <div class="card-header">
                    <h3>Total Households</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                      <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                      <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                  </div>
                  <div class="card-content">
                    <div class="stat-value" id="analyticsHouseholds">-</div>
                    <p class="stat-description">Registered households</p>
                  </div>
                </div>

                <div class="analytics-card">
                  <div class="card-header">
                    <h3>Total Residents</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                      <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                      <circle cx="9" cy="7" r="4"></circle>
                      <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                      <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                  </div>
                  <div class="card-content">
                    <div class="stat-value" id="analyticsResidents">-</div>
                    <p class="stat-description">Registered residents</p>
                  </div>
                </div>

                <div class="analytics-card">
                  <div class="card-header">
                    <h3>Settled Cases</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                      <path d="M8 3H5a2 2 0 0 0-2 2v14c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2V8h-3"></path>
                      <path d="M17 21v-8h-8v8"></path>
                      <path d="M7 13h8"></path>
                      <path d="M7 17h5"></path>
                    </svg>
                  </div>
                  <div class="card-content">
                    <div class="stat-value" id="analyticsSettledCases">-</div>
                    <p class="stat-description" id="settledCasesPercentage">-</p>
                  </div>
                </div>

                <div class="analytics-card">
                  <div class="card-header">
                    <h3>Unsettled Cases</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                      <circle cx="12" cy="12" r="10"></circle>
                      <line x1="12" y1="8" x2="12" y2="12"></line>
                      <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                  </div>
                  <div class="card-content">
                    <div class="stat-value" id="analyticsUnsettledCases">-</div>
                    <p class="stat-description" id="unsettledCasesPercentage">-</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-content" id="demographics">
              <h2 class="section-title">Demographics</h2>
              <div class="card-grid">
                <div class="analytics-card">
                  <div class="card-header">
                    <h3>Males</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                      <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                      <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                  </div>
                  <div class="card-content">
                    <div class="stat-value" id="analyticsMales">-</div>
                    <p class="stat-description" id="malesPercentage">-</p>
                  </div>
                </div>

                <div class="analytics-card">
                  <div class="card-header">
                    <h3>Females</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                      <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                      <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                  </div>
                  <div class="card-content">
                    <div class="stat-value" id="analyticsFemales">-</div>
                    <p class="stat-description" id="femalesPercentage">-</p>
                  </div>
                </div>

                <div class="analytics-card">
                  <div class="card-header">
                    <h3>Minors</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                      <path d="M9 12h.01"></path>
                      <path d="M15 12h.01"></path>
                      <path d="M10 16c.5.3 1.2.5 2 .5s1.5-.2 2-.5"></path>
                      <path d="M19 6.3a9 9 0 0 1 1.8 3.9 2 2 0 0 1 0 3.6 9 9 0 0 1-17.6 0 2 2 0 0 1 0-3.6A9 9 0 0 1 12 3c2 0 3.5 1.1 3.5 2.5s-.9 2.5-2 2.5c-.8 0-1.5-.4-1.5-1"></path>
                    </svg>
                  </div>
                  <div class="card-content">
                    <div class="stat-value" id="analyticsMinors">-</div>
                    <p class="stat-description" id="minorsPercentage">-</p>
                  </div>
                </div>


                <!-- Seniors Card -->
                <div class="analytics-card">
                <div class="card-header">
                    <h3>Seniors</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                    <path d="M17 2a2 2 0 0 1 2 2v2h-2"></path>
                    <path d="M7 2a2 2 0 0 0-2 2v2h2"></path>
                    <rect width="18" height="18" x="3" y="6" rx="2"></rect>
                    <path d="M16 10l-4 4-4-4"></path>
                    </svg>
                </div>
                <div class="card-content">
                    <div class="stat-value" id="analyticsSeniors">-</div>
                    <p class="stat-description" id="seniorsPercentage">-</p>
                </div>
                </div>

                <!-- Voters of Barangay Card -->
                <div class="analytics-card">
                <div class="card-header">
                    <h3>Barangay Voters</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                    <path d="M22 12h-4"></path>
                    <path d="M2 12h4"></path>
                    <path d="M12 2v4"></path>
                    <path d="M12 22v-4"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                </div>
                <div class="card-content">
                    <div class="stat-value" id="analyticsVoters">-</div>
                    <p class="stat-description" id="votersPercentage">-</p>
                </div>
                </div>

                <!-- PWD Card -->
                <div class="analytics-card">
                <div class="card-header">
                    <h3>PWD</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M12 16v-8"></path>
                    <path d="M8 12h8"></path>
                    </svg>
                </div>
                <div class="card-content">
                    <div class="stat-value" id="analyticsPWD">-</div>
                    <p class="stat-description" id="pwdPercentage">-</p>
                </div>
                </div>

                <!-- Head of Family Card -->
                <div class="analytics-card">
                <div class="card-header">
                    <h3>Head of Family</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                    <path d="M3 12l2-2 4 4 8-8 4 4"></path>
                    <path d="M21 16v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-5"></path>
                    </svg>
                </div>
                <div class="card-content">
                    <div class="stat-value" id="analyticsFamilyHeads">-</div>
                    <p class="stat-description" id="familyHeadsPercentage">-</p>
                </div>
                </div>

                <!-- Civil Status Card -->
                <div class="analytics-card">
                <div class="card-header">
                    <h3>Not head of family</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                    <path d="M20 6L9 17l-5-5"></path>
                    </svg>
                </div>
                <div class="card-content">
                    <div class="stat-value" id="analyticsNonHead">-</div>
                    <p class="stat-description" id="analyticsNonHeadPercentage">-</p>
                </div>
                </div>

              </div>
            </div>

            <div class="tab-content" id="cases">
              <h2 class="section-title">Cases</h2>
              <div class="card-grid-2">
                <div class="analytics-card">
                  <div class="card-header">
                    <h3>Case Resolution</h3>
                    <p>Overview of case settlement status</p>
                  </div>
                  <div class="card-content">
                    <div class="stat-list">
                      <div class="stat-item">
                        <div class="stat-label">
                          <span class="color-dot green"></span>
                          <span>Settled Cases</span>
                        </div>
                        <span class="stat-number" id="settledCasesNumber">-</span>
                      </div>
                      <div class="stat-item">
                        <div class="stat-label">
                          <span class="color-dot red"></span>
                          <span>Unsettled Cases</span>
                        </div>
                        <span class="stat-number" id="unsettledCasesNumber">-</span>
                      </div>
                      <div class="stat-item">
                        <div class="stat-label">
                          <span class="color-dot gray"></span>
                          <span>Total Cases</span>
                        </div>
                        <span class="stat-number" id="totalCasesNumber">-</span>
                      </div>
                    </div>
                    <div class="card-footer">
                      <p id="casesSettledPercentage">-</p>
                    </div>
                  </div>
                </div>

                <div class="analytics-card">
                  <div class="card-header">
                    <h3>Additional Demographics</h3>
                    <p>Other resident statistics</p>
                  </div>
                  <div class="card-content">
                    <div class="stat-list">
                      <div class="stat-item">
                        <span>Single</span>
                        <span class="stat-number" id="singleResident">-</span>
                      </div>
                      <div class="stat-item">
                        <span>Married</span>
                        <span class="stat-number" id="marriedResident">-</span>
                      </div>
                      <div class="stat-item">
                        <span>Separated</span>
                        <span class="stat-number" id="separatedResident">-</span>
                      </div>
                      <div class="stat-item">
                        <span>Divorced</span>
                        <span class="stat-number" id="divorcedResident">-</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="print-footer">
            <p>This report was generated on <span id="currentDateFooter"></span> at <span id="currentTime"></span></p>
          </div>
        </div>
        <!-- Analytics content ends here -->
      </div>

      <footer class="footer">
        <p class="copyright">
          Copyright 2025 Barangay 42-C. All Rights Reserved.
        </p>
      </footer>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    const countHouseHold = function() {
        $('#countHouseHold').text('Loading...'); 

        $.ajax({
            url: '<?= base_url("admin/count-house-status") ?>',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#countHouseHold').text(response.count);
                // Also update the analytics households count
                $('#analyticsHouseholds').text(formatNumber(response.count));
            },
            error: function(xhr, status, error) {
                console.error("AJAX error:", error);
                $('#countHouseHold').text('Error'); 
                $('#analyticsHouseholds').text('Error');
            }
        });
    };
    const countResidents = function() {
        $('#countResidents').text('Loading...');

        $.ajax({
            url: '<?= base_url("admin/count-residents") ?>',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#countResidents').text(response.count);
                // Also update the analytics residents count
                $('#analyticsResidents').text(formatNumber(response.count));
            },
            error: function(xhr, status, error) {
                console.error("AJAX error:", error);
                $('#countResidents').text('Error');
                $('#analyticsResidents').text('Error');
            }
        });
    };

    const countCompletedComplaints = function() {
        $('#countCompletedComplaints').text('Loading...');

        $.ajax({
            url: '<?= base_url("admin/count-completed-complaints") ?>',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#countCompletedComplaints').text(response.count);
                // Also update the analytics settled cases count
                $('#analyticsSettledCases').text(formatNumber(response.count));
                $('#settledCasesNumber').text(formatNumber(response.count));
                updateCasesPercentages();
            },
            error: function(xhr, status, error) {
                console.error("AJAX error:", error);
                $('#countCompletedComplaints').text('Error');
                $('#analyticsSettledCases').text('Error');
                $('#settledCasesNumber').text('Error');
            }
        });
    };

    const countPendingComplaints = function() {
        $('#countPendingComplaints').text('Loading...');

        $.ajax({
            url: '<?= base_url("admin/count-pending-complaints") ?>',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#countPendingComplaints').text(response.count);
                // Also update the analytics unsettled cases count
                $('#analyticsUnsettledCases').text(formatNumber(response.count));
                $('#unsettledCasesNumber').text(formatNumber(response.count));
                updateCasesPercentages();
            },
            error: function(xhr, status, error) {
                console.error("AJAX error:", error);
                $('#countPendingComplaints').text('Error');
                $('#analyticsUnsettledCases').text('Error');
                $('#unsettledCasesNumber').text('Error');
            }
        });
    };

    const loadEvents = function() {
        $.ajax({
            url: "<?= base_url('admin/get-events-dashboard') ?>",  
            method: "GET",
            dataType: "json",
            success: function(events) {
                const eventsContainer = $('#events-container');
                eventsContainer.empty(); 

                events.forEach(function(event) {
                    const startDate = new Date(event.start_date);
                    const day = startDate.getDate();
                    const month = startDate.toLocaleString('default', { month: 'short' });

                    const eventHtml = `
                        <div class="event">
                            <div class="event__date">
                                <p class="day">${day}</p>
                                <p class="month">${month}</p>
                            </div>
                            <div class="event__title__box">
                                <p class="event__title">${event.event_title}</p>
                            </div>
                        </div>
                    `;

                    eventsContainer.append(eventHtml);
                });
            },
            error: function(xhr, status, error) {
                console.error("Error loading events:", error);
            }
        });
    };
    const loadNewUsers = function() {
        $.ajax({
            url: '<?= base_url("admin/get-new-users") ?>',  // URL for the AJAX request
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                let newAccountsContainer = $('#newAccounts');
                newAccountsContainer.empty();  // Clear the container before appending new data

                // Loop through each user and generate HTML
                $.each(response, function(index, user) {
                    let userItem = `
                        <div class="birthday__item">
                            <div class="img__box__birthday">
                                <!-- Check if image exists and prepend 'assets/' to image path -->
                                <img class="user__img__display" src="<?= base_url('') ?>${user.image ? user.image : 'assets/images/default.png'}" alt="User image" />
                                <div class="user__details">
                                    <p class="user__name">${user.firstname} ${user.lastname}</p>
                                    <p class="position">${user.role}</p>
                                </div>
                            </div>
                            <div class="birthday__box">
                                <p class="birthday__day">${new Date(user.created_at).getDate()}</p>
                                <p class="birthday__month">${new Date(user.created_at).toLocaleString('default', { month: 'short' })}</p>
                            </div>
                        </div>
                    `;
                    newAccountsContainer.append(userItem);  // Add each user to the container
                });
            },
            error: function(xhr, status, error) {
                console.error("Error loading new users:", error);
            }
        });
    };

    const loadUpcomingBirthdays = function () {
        $.ajax({
            url: '<?= base_url("admin/get-upcoming-birthdays") ?>',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                let birthdayContainer = $('#birthdayList');
                birthdayContainer.empty();

                $.each(response, function (index, resident) {
                    let birthdate = new Date(resident.birthdate);

                    let birthdayItem = `
                        <div class="birthday__item">
                            <div class="img__box__birthday">
                                <div class="user__details">
                                    <p class="user__name">${resident.full_name}</p>
                                    <p class="position">Birthday</p>
                                </div>
                            </div>
                            <div class="birthday__box">
                                <p class="birthday__day">${birthdate.getDate()}</p>
                                <p class="birthday__month">${birthdate.toLocaleString('default', { month: 'short' })}</p>
                            </div>
                        </div>
                    `;
                    birthdayContainer.append(birthdayItem);
                });
            },
            error: function (xhr, status, error) {
                console.error("Error loading birthdays:", error);
            }
        });
    };

    // Analytics specific functions
    function updateCasesPercentages() {
        // Get the values as numbers
        const settledCases = parseInt($('#settledCasesNumber').text().replace(/,/g, '')) || 0;
        const unsettledCases = parseInt($('#unsettledCasesNumber').text().replace(/,/g, '')) || 0;
        
        // Calculate total
        const totalCases = settledCases + unsettledCases;
        $('#totalCasesNumber').text(formatNumber(totalCases));
        
        // Calculate percentages
        if (totalCases > 0) {
            const settledPercentage = Math.round((settledCases / totalCases) * 100);
            const unsettledPercentage = Math.round((unsettledCases / totalCases) * 100);
            
            $('#settledCasesPercentage').text(settledPercentage + '% of total cases');
            $('#unsettledCasesPercentage').text(unsettledPercentage + '% of total cases');
            $('#casesSettledPercentage').text(settledPercentage + '% of cases have been settled');
        }
    }

    function formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Analytics tab switching functionality
    function setupAnalyticsTabs() {
        $('.tab-button').on('click', function() {
            // Remove active class from all buttons and contents
            $('.tab-button').removeClass('active');
            $('.tab-content').removeClass('active');

            // Add active class to clicked button and corresponding content
            $(this).addClass('active');
            const tabId = $(this).data('tab');
            $('#' + tabId).addClass('active');
        });

        // Print functionality
        $('#printButton').on('click', function() {
            window.print();
        });

        // Set current date and time for print header/footer
        const now = new Date();
        const dateOptions = { year: 'numeric', month: 'long', day: 'numeric' };
        const timeOptions = { hour: '2-digit', minute: '2-digit' };
        
        $('#currentDate').text(now.toLocaleDateString(undefined, dateOptions));
        $('#currentDateFooter').text(now.toLocaleDateString(undefined, dateOptions));
        $('#currentTime').text(now.toLocaleTimeString(undefined, timeOptions));
    }

    // Load demographic data for analytics
    function loadDemographicData() {
        $.ajax({
            url: "<?= base_url('admin/get-resident-stats') ?>",
            method: "GET",
            dataType: "json",
            success: function (data) {
                // Set males count
                $('#analyticsMales').text(formatNumber(data.male));
                
                // Set females count
                $('#analyticsFemales').text(formatNumber(data.female));
                
                // Set minors count
                $('#analyticsMinors').text(formatNumber(data.minors));
                // Set minors count
                $('#analyticsSeniors').text(formatNumber(data.seniors));
                // Set minors count
                $('#analyticsVoters').text(formatNumber(data.voters));
                // Set minors count
                $('#analyticsPWD').text(formatNumber(data.pwd));
                // Set minors count
                $('#analyticsFamilyHeads').text(formatNumber(data.head_of_family));
                // Set minors count
                $('#analyticsNonHead').text(formatNumber(data.non_head_of_family));
                // Set minors count
 
                
                // Calculate total residents from male + female
                const totalResidents = data.male + data.female;
                
                // Set percentages
                if (totalResidents > 0) {
                    $('#malesPercentage').text(Math.round((data.male / totalResidents) * 100) + '% of residents');
                    $('#femalesPercentage').text(Math.round((data.female / totalResidents) * 100) + '% of residents');
                    $('#minorsPercentage').text(Math.round((data.minors / totalResidents) * 100) + '% of residents');
                    $('#seniorsPercentage').text(Math.round((data.seniors / totalResidents) * 100) + '% of residents');
                    $('#votersPercentage').text(Math.round((data.voters / totalResidents) * 100) + '% of residents');
                    $('#pwdPercentage').text(Math.round((data.pwd / totalResidents) * 100) + '% of residents');
                    $('#familyHeadsPercentage').text(Math.round((data.head_of_family / totalResidents) * 100) + '% of residents');
                    $('#analyticsNonHeadPercentage').text(Math.round((data.non_head / totalResidents) * 100) + '% of residents');
                }
                
                // Set additional demographics (using available data or placeholders)
                $('#singleResident').text(formatNumber(data.single || 456));
                $('#marriedResident').text(formatNumber(data.married || 1567));
                $('#separatedResident').text(formatNumber(data.separated || 789));
                $('#divorcedResident').text(formatNumber(data.divorced || 678));
            },
            error: function(xhr, status, error) {
                console.error("Error loading resident statistics:", error);
            }
        });
    }

    // Call it on page load if needed
    $(document).ready(function() {
        countHouseHold();
        countResidents();
        countCompletedComplaints();
        countPendingComplaints();
        loadEvents();
        loadNewUsers();
        loadUpcomingBirthdays();
        
        // Setup analytics functionality
        setupAnalyticsTabs();
        loadDemographicData();
    });


    document.addEventListener("DOMContentLoaded", function () {
      $.ajax({
        url: "<?= base_url('admin/get-resident-stats') ?>",
        method: "GET",
        dataType: "json",
        success: function (data) {
          const options = {
            series: [
              data.male,
              data.female,
              data.minors,
              data.non_voters,
              data.non_head,
              data.head_of_family,  // Added head of family
              data.archived,
              data.pwd,
              data.voters,
            ],
            labels: [
              "Male",
              "Female",
              "Minors",
              "Non Voters",
              "Non Head of the Family",
              "Head of the Family",  // Added label
              "Archived",
              "PWD",
              "Voters",
            ],
            chart: {
              type: "donut",
              height: 380,
            },
            colors: [
              "#2196F3", // Male
              "#9C27B0", // Female
              "#F44336", // Minors
              "#009688", // Non Voters
              "#FF9800", // Non Head
              "#8E44AD", // Head of the Family (NEW)
              "#00BCD4", // Archived
              "#4CAF50", // PWD
              "#FFC107", // Voters
            ],
            legend: {
              position: "left",
              offsetY: 20,
            },
            plotOptions: {
              pie: {
                donut: {
                  size: "65%",
                  labels: {
                    show: true,
                    total: {
                      show: true,
                      showAlways: true,
                      label: "Total",
                      fontSize: "22px",
                      fontFamily: "Helvetica, Arial, sans-serif",
                      fontWeight: 600,
                      color: "#373d3f",
                    },
                  },
                },
              },
            },
            responsive: [
              {
                breakpoint: 480,
                options: {
                  chart: {
                    height: 300,
                  },
                  legend: {
                    position: "bottom",
                  },
                },
              },
            ],
            tooltip: {
              y: {
                formatter: function (value) {
                  return value; // Value as is
                },
              },
            },
          };

          const chart = new ApexCharts(document.querySelector("#chart"), options);
          chart.render();
        },
        error: function (xhr, status, error) {
          console.error("Error loading chart data:", error);
        }
      });
    });
    </script>
    <script>
      $(document).ready(function () {
        $(".menu__icon").on("click", function () {
          $("body").toggleClass("hide__sidebar");
          $(".nav__heading").toggleClass("d__none");
        });

        $(".user__box").on("click", function () {
          $(".dropdown__menu").toggleClass("show");
        });
      });
    </script>
  </body>
</html>