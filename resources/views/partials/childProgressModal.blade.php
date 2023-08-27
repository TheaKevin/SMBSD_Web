<div class="modal fade" id="progressModal{{ $progress->id }}" tabindex="-1" role="dialog" aria-labelledby="progressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="progressModalLabel">{{ date('M Y', strtotime($progress->created_at)) }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    
                </button>
            </div>
            <div class="modal-body">
                <div>
                    {{ $progress->childProgressSummary }}
                </div>
                <div>
                    {{ $progress->childProgressLearned }}
                </div>
                {{-- Display other child progress details here --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
