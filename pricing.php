<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/catalog-pricing.php';
include __DIR__ . '/includes/header.php';

$catalog = mazerp_fetch_app_pricing_catalog();

$plan_meta = [];
$seen_plans = [];
foreach ($catalog['apps'] as $row) {
    foreach ($row['prices'] as $price) {
        $pid = (int) $price['plan_id'];
        if (isset($seen_plans[$pid])) {
            continue;
        }
        $seen_plans[$pid] = true;
        $plan_meta[] = [
            'id'      => $pid,
            'code'    => (string) ($price['plan_code'] ?? ''),
            'name'    => (string) ($price['plan_name'] ?? 'Plan'),
            'blurb'   => (string) ($price['short_description'] ?? ''),
            'popular' => !empty($price['is_popular']),
            'sort'    => (int) ($price['sort_order'] ?? 0),
        ];
    }
}
usort($plan_meta, function ($a, $b) {
    return $a['sort'] <=> $b['sort'] ?: $a['id'] <=> $b['id'];
});

$app_copy = [
    'books' => [
        'name' => 'Books',
        'desc' => 'Accounting, inventory, sales, and purchases',
        'url'  => 'erp.php',
        'icon' => 'fa-book-open',
        'tone' => 'blue',
        'features' => [
            2 => ['GST billing', 'Inventory', 'Sales and purchases'],
            3 => ['1 branch', 'E-Way Bill', 'Barcode'],
            6 => ['POS', 'E-invoicing', '3 users, 3 branches'],
            4 => ['Unlimited invoices', 'Unlimited e-invoicing', '5 users, 5 branches'],
        ],
        'compare' => [
            ['label' => 'GST billing', 'cells' => [2 => true, 3 => true, 6 => true, 4 => true]],
            ['label' => 'Inventory', 'cells' => [2 => true, 3 => true, 6 => true, 4 => true]],
            ['label' => 'Branches', 'cells' => [2 => '1 organisation', 3 => '1 branch', 6 => '3 branches', 4 => '5 branches']],
            ['label' => 'E-Way Bill', 'cells' => [2 => false, 3 => true, 6 => true, 4 => true]],
            ['label' => 'Barcode', 'cells' => [2 => false, 3 => true, 6 => true, 4 => true]],
            ['label' => 'POS', 'cells' => [2 => false, 3 => false, 6 => true, 4 => true]],
            ['label' => 'E-invoicing', 'cells' => [2 => false, 3 => false, 6 => true, 4 => 'Unlimited']],
            ['label' => 'Invoices', 'cells' => [2 => 'GST billing', 3 => 'E-Way Bill', 6 => 'POS + e-invoice', 4 => 'Unlimited']],
            ['label' => 'Users', 'cells' => [2 => '1 user', 3 => '1 user', 6 => '3 users', 4 => '5 users']],
        ],
    ],
    'crm' => [
        'name' => 'CRM',
        'desc' => 'Leads, deals, and customer follow-up',
        'url'  => 'crm.php',
        'icon' => 'fa-users',
        'tone' => 'green',
        'features' => [
            2 => ['Lead management', 'Follow-ups', 'Basic reports'],
            3 => ['Sales pipeline', 'Tasks', '2,000 contacts'],
            6 => ['Automation', '10,000 contacts', '5 users'],
            4 => ['Unlimited contacts', 'Roles', 'API access'],
        ],
        'compare' => [
            ['label' => 'Lead management', 'cells' => [2 => true, 3 => true, 6 => true, 4 => true]],
            ['label' => 'Follow-ups', 'cells' => [2 => true, 3 => true, 6 => true, 4 => true]],
            ['label' => 'Sales pipeline', 'cells' => [2 => false, 3 => true, 6 => true, 4 => true]],
            ['label' => 'Contacts', 'cells' => [2 => 'Starter', 3 => '2,000', 6 => '10,000', 4 => 'Unlimited']],
            ['label' => 'Users', 'cells' => [2 => '1 user', 3 => '2 users', 6 => '5 users', 4 => 'Unlimited']],
            ['label' => 'Automation', 'cells' => [2 => false, 3 => false, 6 => true, 4 => true]],
            ['label' => 'Roles', 'cells' => [2 => false, 3 => false, 6 => false, 4 => true]],
            ['label' => 'API access', 'cells' => [2 => false, 3 => false, 6 => false, 4 => true]],
        ],
    ],
    'timex' => [
        'name' => 'Timex',
        'desc' => 'Attendance, shifts, and workforce time',
        'url'  => 'timex.php',
        'icon' => 'fa-clock',
        'tone' => 'amber',
        'features' => [
            2 => ['Daily attendance', 'Basic shifts', 'One branch'],
            3 => ['Shift patterns', 'Manager review', 'Multi-branch'],
            6 => ['Branch-aware hours', 'Priority support', 'Exports'],
            4 => ['Full workforce time', 'Named support', 'Custom onboarding'],
        ],
        'compare' => [
            ['label' => 'Daily attendance', 'cells' => [2 => true, 3 => true, 6 => true, 4 => true]],
            ['label' => 'Shifts', 'cells' => [2 => 'Basic', 3 => 'Patterns', 6 => 'Branch-aware', 4 => 'Full workforce']],
            ['label' => 'Branches', 'cells' => [2 => 'One branch', 3 => 'Multi-branch', 6 => 'Multi-branch', 4 => 'Multi-branch']],
            ['label' => 'Manager review', 'cells' => [2 => false, 3 => true, 6 => true, 4 => true]],
            ['label' => 'Exports', 'cells' => [2 => false, 3 => true, 6 => true, 4 => true]],
            ['label' => 'Support', 'cells' => [2 => 'Email', 3 => 'Email', 6 => 'Priority', 4 => 'Named']],
        ],
    ],
];

$apps = [];
$order = [];
foreach ($catalog['apps'] as $row) {
    $code = (string) ($row['app_code'] ?? '');
    if ($code === '' || !isset($app_copy[$code])) {
        continue;
    }
    $copy = $app_copy[$code];
    $prices = mazerp_catalog_price_map($row['prices'] ?? []);
    if (!$prices) {
        continue;
    }
    $order[] = $code;
    $apps[$code] = [
        'name'     => (string) ($row['app_name'] ?: $copy['name']),
        'desc'     => (string) (($row['short_description'] ?? '') ?: $copy['desc']),
        'url'      => $copy['url'],
        'icon'     => $copy['icon'],
        'tone'     => $copy['tone'],
        'from'     => mazerp_catalog_lowest_monthly($row['prices'] ?? []),
        'features' => $copy['features'],
        'compare'  => $copy['compare'],
        'prices'   => $prices,
    ];
}

$payload = json_encode([
    'plans'       => $plan_meta,
    'order'       => $order,
    'apps'        => $apps,
    'registerUrl' => PORTAL_APP_URL . '/auth/register',
], JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP);
?>

<div class="pv3-page">

<section class="pv3-stage">
  <div class="container">
    <div class="pv3-head">
      <p class="pv3-step">Step 1 · Mix</p>
      <h1>Build a workspace, then pick a plan</h1>
      <p>All in one is on by default. Switch an app off if you only need some of them. Global is included at ₹0.</p>
    </div>

        <div class="pv3-mixer" role="group" aria-label="Apps in this quote">
      <?php foreach ($apps as $code => $app): ?>
      <button type="button"
        class="pv3-tile pv3-tile--<?php echo htmlspecialchars($app['tone']); ?> is-on"
        data-app="<?php echo htmlspecialchars($code); ?>"
        aria-pressed="true">
        <span class="pv3-tile-top">
          <span class="pv3-tile-icon" aria-hidden="true"><i class="fa-solid <?php echo htmlspecialchars($app['icon']); ?>"></i></span>
          <span class="pv3-switch" aria-hidden="true"><span></span></span>
        </span>
        <strong><?php echo htmlspecialchars($app['name']); ?></strong>
        <span class="pv3-tile-desc"><?php echo htmlspecialchars($app['desc']); ?></span>
        <span class="pv3-tile-from">from ₹<?php echo number_format((int) $app['from']); ?>/mo</span>
      </button>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="pv3-plans-wrap" id="pv3Plans">
  <div class="container">
    <div class="pv3-plans-bar">
      <div>
        <p class="pv3-step">Step 2 · Plan</p>
        <h2 id="pv3Lead">All in one</h2>
        <p class="pv3-pick-hint">Select a plan to continue. Tick Add to compare on two plans, then Compare.</p>
      </div>
      <div class="pv3-cycle" role="group" aria-label="Billing cycle">
        <button type="button" class="is-on" id="pv3Monthly">Monthly</button>
        <button type="button" id="pv3Annual">Annual <em>save ~8%</em></button>
      </div>
    </div>

    <div class="pv3-grid" id="pv3Grid"></div>
    <p class="pv3-footnote">Tick <strong>Add to compare</strong> on two or more plans, then open Compare. Global is included at ₹0.</p>
  </div>
</section>

<div class="pv3-cmp-bar" id="pv3CmpBar" hidden>
  <span id="pv3CmpCount">0 plans</span>
  <button type="button" class="btn btn-primary" id="pv3CmpOpen" disabled>Compare</button>
  <button type="button" class="btn btn-ghost" id="pv3CmpClear">Clear</button>
</div>

<div class="modal-overlay pv3-cmp-modal" id="pv3CmpModal" hidden>
  <div class="modal-back" data-cmp-close></div>
  <div class="modal-box pv3-cmp-box" role="dialog" aria-modal="true" aria-labelledby="pv3CmpTitle">
    <button type="button" class="modal-close" data-cmp-close aria-label="Close">&times;</button>
    <h2 id="pv3CmpTitle">Compare plans</h2>
    <p class="pv3-pick-hint" id="pv3CmpHint"></p>
    <div class="pv3-cmp-head" id="pv3CmpHead"></div>
    <div class="pv3-cmp-table-wrap" id="pv3CmpBody"><p>Loading…</p></div>
  </div>
</div>

<div class="pv3-dock" id="pv3Dock" hidden>
  <div class="container pv3-dock-inner">
    <div class="pv3-dock-mix" id="pv3DockMix"></div>
    <div class="pv3-dock-price">
      <span>Selected</span>
      <strong id="pv3DockFrom">—</strong>
      <span id="pv3DockPeriod"></span>
    </div>
    <a class="btn btn-primary is-disabled" id="pv3DockCta" href="<?php echo htmlspecialchars(PORTAL_APP_URL . '/auth/register'); ?>" aria-disabled="true">Start free trial</a>
  </div>
</div>

</div>

<script>
(function () {
  var data = <?php echo $payload; ?>;
  var order = data.order && data.order.length ? data.order.slice() : Object.keys(data.apps);
  var names = {};
  order.forEach(function (code) {
    names[code] = data.apps[code].name;
  });
  var appBtns = document.querySelectorAll('.pv3-tile');
  var grid = document.getElementById('pv3Grid');
  var lead = document.getElementById('pv3Lead');
  var monthlyBtn = document.getElementById('pv3Monthly');
  var annualBtn = document.getElementById('pv3Annual');
  var dock = document.getElementById('pv3Dock');
  var dockMix = document.getElementById('pv3DockMix');
  var dockFrom = document.getElementById('pv3DockFrom');
  var dockPeriod = document.getElementById('pv3DockPeriod');
  var dockCta = document.getElementById('pv3DockCta');
  var registerBase = data.registerUrl || 'http://localhost:4200/auth/register';
  var cmpBar = document.getElementById('pv3CmpBar');
  var cmpCount = document.getElementById('pv3CmpCount');
  var cmpOpen = document.getElementById('pv3CmpOpen');
  var cmpClear = document.getElementById('pv3CmpClear');
  var cmpModal = document.getElementById('pv3CmpModal');
  var cmpBody = document.getElementById('pv3CmpBody');
  var cmpHead = document.getElementById('pv3CmpHead');
  var cmpHint = document.getElementById('pv3CmpHint');
  var selected = {};
  order.forEach(function (code) { selected[code] = true; });
  var annual = false;
  var selectedPlanId = 0;
  var compareIds = {};

  function esc(s) {
    return String(s).replace(/[&<>"']/g, function (c) {
      return ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' })[c];
    });
  }

  function inr(n) {
    return '₹' + Math.round(n).toLocaleString('en-IN');
  }

  function picked() {
    return order.filter(function (code) { return selected[code]; });
  }

  function sumPlan(planId, yearly) {
    return picked().reduce(function (sum, code) {
      var row = data.apps[code] && data.apps[code].prices && data.apps[code].prices[planId];
      if (!row) return sum;
      return sum + Number(yearly ? row.yearly : row.monthly);
    }, 0);
  }

  function compareList() {
    return data.plans.filter(function (p) { return compareIds[p.id]; }).map(function (p) { return p.id; });
  }

  function renderCompareBar() {
    var ids = compareList();
    var n = ids.length;
    cmpBar.hidden = n === 0;
    cmpCount.textContent = n === 1 ? '1 plan' : n + ' plans';
    cmpOpen.disabled = n < 2;
  }

  function render() {
    var list = picked();
    if (!list.length && order[0]) {
      selected[order[0]] = true;
      list = [order[0]];
    }
    var n = list.length;
    var all = n === order.length && n > 1;
    appBtns.forEach(function (b) {
      var on = !!selected[b.getAttribute('data-app')];
      b.classList.toggle('is-on', on);
      b.setAttribute('aria-pressed', on ? 'true' : 'false');
    });
    monthlyBtn.classList.toggle('is-on', !annual);
    annualBtn.classList.toggle('is-on', annual);

    var label = list.map(function (c) { return names[c]; }).join(' + ');
    if (all) {
      lead.textContent = 'All in one · each app’s plan, added together';
    } else if (n === 1) {
      lead.textContent = names[list[0]] + ' only';
    } else {
      lead.textContent = label + ' · each app’s plan, added together';
    }

    var chosen = data.plans.filter(function (p) { return p.id === selectedPlanId; })[0];
    dock.hidden = !chosen;
    document.body.classList.toggle('pv3-has-dock', !!chosen);
    if (chosen) {
      dockFrom.textContent = inr(sumPlan(chosen.id, annual));
      dockPeriod.textContent = (annual ? '/year' : '/month') + ' · ' + chosen.name;
    }
    if (dockCta) {
      if (!chosen || !chosen.code) {
        dockCta.href = registerBase;
        dockCta.classList.add('is-disabled');
        dockCta.setAttribute('aria-disabled', 'true');
      } else {
        var qs = new URLSearchParams({
          plan: String(chosen.code),
          billing: annual ? 'yearly' : 'monthly',
          apps: list.join(','),
        });
        dockCta.href = registerBase + '?' + qs.toString();
        dockCta.classList.remove('is-disabled');
        dockCta.removeAttribute('aria-disabled');
      }
    }
    dockMix.innerHTML = list.map(function (code) {
      return '<button type="button" class="pv3-chip pv3-chip--' + code + '" data-app="' + esc(code) + '">' + esc(names[code]) + '</button>';
    }).join('');

    grid.innerHTML = data.plans.map(function (plan) {
      var total = sumPlan(plan.id, annual);
      var period = annual ? '/year' : '/month';
      return (
        '<article class="pv3-plan' + (plan.popular ? ' is-star' : '') + (plan.id === selectedPlanId ? ' is-picked' : '') +
          '" data-plan-id="' + plan.id + '">' +
          (plan.popular ? '<span class="pv3-star">Most teams</span>' : '') +
          '<h3>' + esc(plan.name) + '</h3>' +
          '<p class="pv3-plan-blurb">' + esc(plan.blurb || '') + '</p>' +
          '<p class="pv3-plan-price"><b>' + esc(inr(total)) + '</b><span>' + period + '</span></p>' +
          '<button type="button" class="pv3-plan-cta" data-select-plan="' + plan.id + '" aria-pressed="' +
            (plan.id === selectedPlanId ? 'true' : 'false') + '">' +
            (plan.id === selectedPlanId ? 'Selected' : 'Select plan') + '</button>' +
          '<label class="pv3-add-cmp"><input type="checkbox" data-compare-plan="' + plan.id + '"' +
            (compareIds[plan.id] ? ' checked' : '') + '> Add to compare</label>' +
        '</article>'
      );
    }).join('');
    renderCompareBar();
  }

  appBtns.forEach(function (b) {
    b.addEventListener('click', function () {
      var code = b.getAttribute('data-app');
      if (selected[code] && picked().length === 1) return;
      selected[code] = !selected[code];
      history.replaceState(null, '', picked().length === order.length ? '#all-in-one' : '#' + picked().join(','));
      render();
    });
  });
  grid.addEventListener('click', function (e) {
    var btn = e.target.closest('[data-select-plan]');
    if (!btn) return;
    var id = Number(btn.getAttribute('data-select-plan'));
    if (!id) return;
    selectedPlanId = id;
    render();
  });
  grid.addEventListener('change', function (e) {
    var input = e.target.closest('[data-compare-plan]');
    if (!input) return;
    var id = Number(input.getAttribute('data-compare-plan'));
    if (!id) return;
    if (input.checked) {
      if (compareList().length >= 4) {
        input.checked = false;
        return;
      }
      compareIds[id] = true;
    } else {
      delete compareIds[id];
    }
    renderCompareBar();
  });
  function closeCompareModal() {
    cmpModal.classList.remove('open');
    cmpModal.setAttribute('hidden', '');
    document.body.style.overflow = '';
  }

  function openCompareModal() {
    var ids = compareList();
    if (ids.length < 2) return;
    cmpHint.textContent = picked().map(function (c) { return names[c]; }).join(' + ');
    cmpHead.innerHTML = '';
    cmpBody.innerHTML = '<p>Loading…</p>';
    cmpModal.removeAttribute('hidden');
    cmpModal.classList.add('open');
    document.body.style.overflow = 'hidden';
    var url = 'catalog-compare.php?plan_ids=' + encodeURIComponent(ids.join(',')) +
      '&app_codes=' + encodeURIComponent(picked().join(','));
    fetch(url, { headers: { Accept: 'application/json' } })
      .then(function (res) { return res.json(); })
      .then(function (json) {
        var pack = json && json.data;
        if (!pack || !pack.plans) {
          cmpHead.innerHTML = '';
          cmpBody.innerHTML = '<p>' + esc(json && json.message ? json.message : 'Compare is unavailable.') + '</p>';
          return;
        }
        var plans = pack.plans;
        var n = plans.length;
        var colW = (78 / n).toFixed(4);
        var cols = '<colgroup><col style="width:22%">' +
          plans.map(function () { return '<col style="width:' + colW + '%">'; }).join('') +
          '</colgroup>';
        cmpHead.innerHTML =
          '<table class="compare-tbl pv3-cmp-lock">' + cols + '<thead><tr><th>Feature</th>' +
          plans.map(function (plan) {
            return '<th>' + esc(plan.plan_name) + '</th>';
          }).join('') + '</tr></thead></table>';
        var html = '<table class="compare-tbl pv3-cmp-lock">' + cols + '<tbody>';
        html += '<tr><td>Price for this mix</td>';
        html += plans.map(function (plan) {
          return '<td><strong>' + esc(inr(sumPlan(plan.id, annual))) + '</strong> ' +
            (annual ? '/year' : '/month') + '</td>';
        }).join('') + '</tr>';
        (pack.groups || []).forEach(function (group) {
          html += '<tr class="pv3-cmp-group"><td colspan="' + (plans.length + 1) + '">' + esc(group.name) + '</td></tr>';
          (group.rows || []).forEach(function (row) {
            html += '<tr><td>' + esc(row.name) + '</td>';
            plans.forEach(function (plan) {
              var cell = (row.cells || {})[plan.id] || (row.cells || {})[String(plan.id)] || { included: false, text: '—' };
              if (!cell.included) {
                html += '<td><span class="no">—</span></td>';
              } else if (cell.text === 'Yes') {
                html += '<td><span class="yes">Yes</span></td>';
              } else {
                html += '<td>' + esc(cell.text || 'Yes') + '</td>';
              }
            });
            html += '</tr>';
          });
        });
        html += '</tbody></table>';
        cmpBody.innerHTML = html;
        cmpBody.onscroll = function () {
          cmpHead.scrollLeft = cmpBody.scrollLeft;
        };
      })
      .catch(function () {
        cmpHead.innerHTML = '';
        cmpBody.innerHTML = '<p>Compare is unavailable right now.</p>';
      });
  }

  cmpOpen.addEventListener('click', openCompareModal);
  cmpClear.addEventListener('click', function () {
    compareIds = {};
    render();
  });
  cmpModal.querySelectorAll('[data-cmp-close]').forEach(function (el) {
    el.addEventListener('click', closeCompareModal);
  });
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && cmpModal.classList.contains('open')) closeCompareModal();
  });
  dockMix.addEventListener('click', function (e) {
    var chip = e.target.closest('[data-app]');
    if (!chip) return;
    var code = chip.getAttribute('data-app');
    if (selected[code] && picked().length === 1) return;
    selected[code] = !selected[code];
    history.replaceState(null, '', picked().length === order.length ? '#all-in-one' : '#' + picked().join(','));
    render();
  });
  monthlyBtn.addEventListener('click', function () { annual = false; render(); });
  annualBtn.addEventListener('click', function () { annual = true; render(); });

  var hash = (location.hash || '').replace('#', '');
  if (hash && hash !== 'all-in-one' && hash !== 'aio' && hash !== 'compare') {
    var bits = hash.split(',');
    var known = bits.filter(function (c) { return !!data.apps[c]; });
    if (known.length) {
      order.forEach(function (c) { selected[c] = false; });
      known.forEach(function (c) { selected[c] = true; });
    }
  }
  render();
})();
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
